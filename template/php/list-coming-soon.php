<?php
require "../../config/pdoconfig.php";

$query = "select * from comingsoon";
$statement = $connection->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$output = '<table class="table table-dark">
<thead>
    <tr>
        <th>#</th>
        <th> name </th>
        <th> release </th>
        <th> valid</th>
        <th> View </th>
    </tr>
</thead>
<tbody>';
if($result){
    foreach ($result as $row) {
       $output .=  '
        
                <tr>
                <td> ' . $row['id'] . ' </td>';
                $query3 = 'SELECT movie1.name FROM comingsoon s JOIN movie movie1 ON s.movie_id = movie1.id WHERE s.id = '.$row['id'].' ';
        $statement = $connection->prepare($query3);
        $statement->execute();
        $result1 = $statement->fetchAll();
        foreach ($result1 as $row1) {   
            $output .= '
            <td> ' . $row1["name"] . ' </td>
            ';
        }
        $output .='
               
                <td>
                ' . $row['datetime'] . '
                </td>
                <td>
                    ' . $row['valid'] . '
                </td>
                <td> 
               <button class="btn btn-danger btn-sm  p-2" id="actor-delete" data-bs-toggle="tooltip" data-bs-placement="bottom"
                title="Delete" data-id="' . $row['id'] . '"><i class="mdi mdi-delete "  aria-hidden="true"></i>
                </button>
                 </td>
            </tr>
                
        ';
    }
}
else{
    $output .=  " Add to List";
}
$output .= '</tbody>
</table>';
echo $output;
?>