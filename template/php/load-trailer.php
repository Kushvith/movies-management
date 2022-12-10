<?php
require "../../config/pdoconfig.php";
$limit = 5;
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
$query = "SELECT * FROM trailer  WHERE main = 0 ";
if($_POST['query'] != ""){
    $query .= '
       and name LIKE "%'.str_replace(' ','%',$_POST["query"]).'%"
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
<table class="table table-bordered">
<thead>
    <tr>
        <th> # </th>
        <th>name </th>
        <th> url </th>
        <th> view</th>
        <th> Action </th>
    </tr>
</thead>
';

if($total >0)
{
    foreach($result as $row)
    {
        $output .= '
        <tbody>

        <tr>
            <td> '.$row['id'].' </td>
            <td> '.$row['name'].'</td>
            <td>
            '.$row['url'].'
            </td>
            <td>
            <div><a href="#" class="item item-1 redbtn" data-id="' . $row['url'] . '" id="view" data-toggle="modal" data-target="#exampleModal"> <i class="ion-play" ></i>View</a></div>
						</div>
            </td>
            <td> 
             <button class="btn btn-primary btn-sm  p-2" id="addlist"  data-bs-toggle="tooltip" data-bs-placement="bottom"
            title="edit" data-id="' . $row['id'] . '"><i class="mdi mdi-library-plus" aria-hidden="true"></i>
            </button>
            <button class="btn btn-primary btn-sm  p-2" id="actor-edit"  data-bs-toggle="tooltip" data-bs-placement="bottom"
            title="edit" data-id="' . $row['id'] . '"><i class="mdi mdi-transcribe w-30" aria-hidden="true"></i>
            </button>
           <button class="btn btn-danger btn-sm  p-2" id="actor-delete" data-bs-toggle="tooltip" data-bs-placement="bottom"
            title="Delete" data-id="' . $row['id'] . '"><i class="mdi mdi-delete "  aria-hidden="true"></i>
            </button>
             </td>
        </tr>
    
    </tbody>
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


$output .= '</table>
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