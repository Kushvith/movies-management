<?php
require "../../config/pdoconfig.php";

$query = "select * from product";
$statement = $connection->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$output = '<table class="table table-dark">
<thead>
    <tr>
        <th></th>
        <th> pname </th>
        <th> price</th>
        <th> dis price</th>
        <th>type</th>
        <th> movie_id</th>
        <th> Action</th>
    </tr>
</thead>
<tbody>';
if($result){
    foreach ($result as $row) {
       $output .=  '
        
                <tr>
                <td> ' . $row['id'] . ' </td>
                <td> ' . $row['name'] . '</td>
                <td>
                ' . $row['price'] . '
                </td>
                <td>
                <div>'.$row['dis'].'</div>

                </td>
                <td> 
                ' . $row['type'] . '
                </td>
                <td> 
                ' . $row['movie_name'] . '
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