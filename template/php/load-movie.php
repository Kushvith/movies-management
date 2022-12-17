<?php
require "../../config/pdoconfig.php";
$limit = 3;
$page = 1;
if($_POST['page'] > 1)
{
    $start = (($_POST['page'] - 1) * $limit);
    $page = $_POST['page'];
}
else
{
    $start = 0;

}
$query = "SELECT * FROM movie ";
if($_POST['query'] != ""){
    $query .= '
      where name LIKE "%'.str_replace(' ','%',$_POST["query"]).'%"
    ';
}
$query .= ' ORDER BY id ASC';
$filter_query = $query . ' LIMIT ' . $start . ',' . $limit . ' ';
$statement = $connection->prepare($query);
$statement->execute();
$total = $statement->rowCount();
$statement = $connection->prepare($filter_query);
$statement->execute();
$result = $statement->fetchAll();
$output = '
<label> Total Records -  '.$total.' </label>
';

if($total >0)
{
    foreach($result as $row)
    {
        $output .= '
        <div class="movie-item-style-2">
        <img src="'.$row['url'].'" alt=" '.$row['publicid'].' ">
        <div class="mv-item-infor">
            <h6><a href="">'.$row['name'].' <span>'.$row['releaseyear'].'</span></a></h6>
            <p class="rate"><i
                    class="ion-android-star"></i><span>'.$row['imdb_ratings'].'</span> /10
            </p>
            <p class="describe">'.$row['description'].'</p>
            <p class="run-time"> Run Time: '.$row['runtime'].'’ . <span>MMPA: '.$row['mmpa'].'
                </span> . <span>Release: '.$row['releaseyear'].'</span></p>
            
      
        ';
        $query3 = 'SELECT user1.id, user1.name FROM movie m JOIN director user1 ON m.director = user1.id WHERE m.id = '.$row['id'].' ';
        $statement = $connection->prepare($query3);
        $statement->execute();
        $result1 = $statement->fetchAll();
      foreach ($result1 as $row1) {
        $output .= '
          <p>Director: <a href="#">'.$row1['name'].'</a></p>
      ';
      }
      $query4 = 'SELECT actor1.fname,actor2.fname,actor3.fname,actor4.fname  FROM movie m
      JOIN actors actor1 ON m.actor = actor1.actor_id
      JOIN actors actor2 ON m.actor1 = actor2.actor_id
      JOIN actors actor3 ON m.actor2 = actor3.actor_id
      JOIN actors actor4 ON m.actor3 = actor4.actor_id WHERE id = '.$row['id'].' ';
      $statement = $connection->prepare($query4);
      $statement->execute();
      $result2 = $statement->fetchAll();
      foreach ($result2 as $row2) {
        $output .= '
        <p>Stars: <a href="#">'.$row2[0].',</a> <a
        href="#">'.$row2['1'].',</a> <a href="#"> '.$row2['2'].'</a> ,<a href="#"> '.$row2['3'].'</a></p>';
      
      }
      $output .= '
      <button class="form-control btn btn btn-danger mt-2" id="delete_movie" data-id='.$row['id'].'>delete</button>
</div>

</div>
    ';
    }
   
}
else
{
    $output .='
    <tr>
        <td colspan="2" align="center"> NO Data Found </td>
    </tr>
    ';
}


$output .= '
    <br/>
    <div align="center">
        <ul class="pagination">
';
$total_links = ceil($total/$limit);
$previous_link = '';
$next_link = '';
$page_link = '';

$page_array = array();

if($total_links > 4)
{
  if($page < 5)
  {
    for($count = 1; $count <= 5; $count++)
    {
      $page_array[] = $count;
    }
    $page_array[] = '...';
    $page_array[] = $total_links;
  }
  else
  {
    $end_limit = $total_links - 5;
    if($page > $end_limit)
    {
      $page_array[] = 1;
      $page_array[] = '...';
      for($count = $end_limit; $count <= $total_links; $count++)
      {
        $page_array[] = $count;
      }
    }
    else
    {
      $page_array[] = 1;
      $page_array[] = '...';
      for($count = $page - 1; $count <= $page + 1; $count++)
      {
        $page_array[] = $count;
      }
      $page_array[] = '...';
      $page_array[] = $total_links;
    }
  }
}
else
{
  for($count = 1; $count <= $total_links; $count++)
  {
    $page_array[] = $count;
  }
}

for($count = 0; $count < count($page_array); $count++)
{
    echo $count;
  if($page == $page_array[$count])
  {
    $page_link .= '
    <li class="page-item active">
      <a class="page-link" href="#">'.$page_array[$count].' <span class="sr-only">(current)</span></a>
    </li>
    ';

    $previous_id = $page_array[$count] - 1;
    if($previous_id > 0)
    {
      $previous_link = '<li class="page-item"><a class="page-link" href="javascript:void(0)" data-page_number="'.$previous_id.'">Previous</a></li>';
    }
    else
    {
      $previous_link = '
      <li class="page-item disabled">
        <a class="page-link" href="#">Prev</a>
      </li>
      ';
    }
    $next_id = $page_array[$count] + 1;
    if($next_id >= $total_links)
    {
      $next_link = '
      <li class="page-item disabled">
        <a class="page-link" href="#">Next</a>
      </li>
        ';
    }
    else
    {
      $next_link = '<li class="page-item"><a class="page-link" href="javascript:void(0)" data-page_number="'.$next_id.'">Next</a></li>';
    }
  }
  else
  {
    if($page_array[$count] == '...')
    {
      $page_link .= '
      <li class="page-item disabled">
          <a class="page-link" href="#">...</a>
      </li>
      ';
    }
    else
    {
      $page_link .= '
      <li class="page-item"><a class="page-link" href="javascript:void(0)" data-page_number="'.$page_array[$count].'">'.$page_array[$count].'</a></li>
      ';
    }
  }
}
$output .= $previous_link . $page_link . $next_link;
$output .= '
  </ul>

</div>

';
         echo $output;
?>