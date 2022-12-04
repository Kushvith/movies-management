<?php
   require "./vendor/autoload.php";
   require "../../config/pdoconfig.php";
   use Cloudinary\Api\Upload\UploadApi;
   use LDAP\Result;
   require './config-cloud.php';
$id = $_POST['id'];
$query = "select * from actors where Actor_id = '$id'";
$statement = $connection->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
foreach ($result as $row) {
    $publicid = $row["publicid"];
}
(new UploadApi())->destroy($publicid,array(
    "folder" => "actor",
));
$query1 = "DELETE FROM actors WHERE Actor_id = '$id'";
$statement1 = $connection->prepare($query1);
$statement1->execute();
$result1 = $statement1->fetchAll();
echo "done";
?>