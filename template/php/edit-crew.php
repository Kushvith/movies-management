<?php
require "../../config/pdoconfig.php";
$id = $_POST['id'];
$query = "select * from director where id = '$id'";
$statement = $connection->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$sub_array = array();
foreach($result as $row)
{
    $sub_array[] = $row["name"];
    $sub_array[] = $row["type"];
    $sub_array[]= $row["dob"];
    $sub_array[] = $row["directed_no"];
    $sub_array[] = $row["place"];
    $sub_array[] = $row["gender"];
    $sub_array[] = $row["details"];
    $sub_array[] = $row["url"];
    $sub_array[] = $id;
}
echo json_encode($sub_array);

?>