<?php
   require "./vendor/autoload.php";
   require "../../config/pdoconfig.php";
   use Cloudinary\Api\Upload\UploadApi;
   require './config-cloud.php';
$id = $_POST['id'];
$query = "select * from director where id = '$id'";
$statement = $connection->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
foreach ($result as $row) {
    $publicid = $row["publicid"];
}
(new UploadApi())->destroy($publicid,array(
    "folder" => "crew",
));
$query1 = "DELETE FROM director WHERE id = '$id'";
$statement1 = $connection->prepare($query1);
$statement1->execute();
$result1 = $statement1->fetchAll();
echo "done";
?>