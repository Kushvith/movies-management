<?php
require "../../config/pdoconfig.php";

$query = "select * from trailer where main = 1";
$statement = $connection->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$output = '<table class="table table-dark">
<thead>
    <tr>
        <th></th>
        <th> name </th>
        <th> url </th>
        <th> View </th>
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
                ' . $row['url'] . '
                </td>
                <td>
                <div><a href="#" class="item item-1 redbtn" data-id="' . $row['url'] . '" id="view" data-toggle="modal" data-target="#exampleModal"> <i class="ion-play" ></i>View</a></div>
                            </div>
                </td>
                <td> 
                 <button class="btn btn-primary btn-sm  p-2" id="removelist"  data-bs-toggle="tooltip" data-bs-placement="bottom"
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