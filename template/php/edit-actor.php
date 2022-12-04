<?php
require "../../config/pdoconfig.php";
$id = $_POST['id'];
$query = "select * from actors where Actor_id = '$id'";
$statement = $connection->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$sub_array = array();
foreach($result as $row)
{
    $sub_array[] = $row["fname"];
    $sub_array[] = $row["lname"];
    $sub_array[]= $row["dob"];
    $sub_array[] = $row["movies_acted"];
    $sub_array[] = $row["place"];
    $sub_array[] = $row["gender"];
    $sub_array[] = $row["details"];
    $sub_array[] = $row["url"];
    $sub_array[] = $id;
}
echo json_encode($sub_array);

?>