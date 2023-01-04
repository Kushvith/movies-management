<?php
session_start();
require "./vendor/autoload.php";
    require "../../config/pdoconfig.php";
    use Cloudinary\Api\Upload\UploadApi;
    require './config-cloud.php';
    $filename = $_FILES["fileimg"]["tmp_name"]; 
 // add here
 $query = "select *  from user_login where id = ".$_SESSION['id']."";
 $statement = $connection->prepare($query);
 $statement->execute();
 $result = $statement->fetchAll();
 if($result){
    foreach ($result as $row) {
        $publicid = $row["publicid"];
    }
    if($publicid != '')
    (new UploadApi())->destroy($publicid,array(
        "folder" => "user",
    ));
 }
 
 $data =  (new UploadApi())->upload($filename,array(
    "folder" => "user",
    "transformation"=>array(
    array("gravity"=>"face", "height"=>200, "width"=>200, "crop"=>"crop"),
    array("radius"=>"max"),
    array("width"=>200, "crop"=>"scale")
    )));
  $url = $data["secure_url"];
  $publicid = $data["public_id"];
  if($url ==""){
    //cloud error
    echo "clouldError";
  } else {
    $query = "update user_login SET url = '$url',publicid = '$publicid' where id = ".$_SESSION['id']."";
    $statement = $connection->prepare($query);
    $run = $statement->execute();
    if ($run) {
        echo "done";
    }
}
    ?>