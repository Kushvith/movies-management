<?php
    require "../../config/pdoconfig.php";
$column = array(
    "fname","lname","dob","movies_acted","place","gender","Actor_id"
);
$query = "SELECT * FROM actors ";
if($_POST["search"]["value"]){
    $query .= '
        where fname like "%'.$_POST["search"]["value"].'%"
        OR lname like "%'.$_POST["search"]["value"].'%"
        OR dob like "%'.$_POST["search"]["value"].'%"
        OR movies_acted like "%'.$_POST["search"]["value"].'%"
        OR place like "%'.$_POST["search"]["value"].'%"
        OR gender like "%'.$_POST["search"]["value"].'%"
    ';
}
if(isset($_POST["order"]))
{
    $query .= 'ORDER BY '.$column[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' ';
}
else
{
    $query .= "ORDER BY Actor_id desc";
}
$query1 = '';
if($_POST["length"] != -1)
{
    $query1 .= ' LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}
$statement = $connection->prepare($query);
$statement->execute();
$number_filter_row = $statement->rowCount();
$result = $connection->query($query . $query1);
$data = array();
$actions = ' ';
foreach($result as $row){
    $sub_array = array();
    $sub_array[] = $row["fname"];
    $sub_array[] = $row["lname"];
    $sub_array[] = $row["dob"];
    $sub_array[] = $row["movies_acted"];
    $sub_array[] = $row["place"];
    $sub_array[] = $row["gender"];
    $sub_array[] = $actions . '<div class="d-flex flex-row bd-highlight mb-3">
    <div class="p-2 bd-highlight">
    <button class="btn btn-success btn-sm  p-2" id="actorview" data-toggle="modal" data-target="#exampleModal" data-bs-toggle="tooltip" data-bs-placement="bottom"
     title="view" data-id="' . $row['Actor_id'] . '"><i class="mdi mdi-folder-multiple-image w-30" aria-hidden="true"></i>
     </button>
    <button class="btn btn-primary btn-sm  p-2" id="actor-edit"  data-bs-toggle="tooltip" data-bs-placement="bottom"
     title="edit" data-id="' . $row['Actor_id'] . '"><i class="mdi mdi-transcribe w-30" aria-hidden="true"></i>
     </button>
    <button class="btn btn-danger btn-sm  p-2" id="actor-delete" data-bs-toggle="tooltip" data-bs-placement="bottom"
     title="Delete" data-id="' . $row['Actor_id'] . '"><i class="mdi mdi-delete "  aria-hidden="true"></i>
     </button>
     </div>
    </div>';  
    $data[] = $sub_array;
}
function count_all_data($connection)
{
    $query = "SELECT * FROM actors";
    $statement = $connection->prepare($query);
    $statement->execute();
    return $statement->rowCount();
}
$output = array(
    "draw" => intval($_POST["draw"]),
    "recordsTotal" => count_all_data($connection),
    "recordsFiltered" => $number_filter_row,
    "data" => $data
);
  echo json_encode($output);
?>