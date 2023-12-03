<?php

require "./vendor/autoload.php";
require "../../config/pdoconfig.php";
use Cloudinary\Api\Upload\UploadApi;
require './config-cloud.php';
$pname =   $_POST['pname'];
$price =   $_POST['price'];
$disPrice =   $_POST['disPrice'];
$movie =   $_POST['movie'];
$pdet =   $_POST['pdet'];
$type = $_POST['type'];
$filename = $_FILES["fileimg"]["tmp_name"];


$data =  (new UploadApi())->upload($filename,array(
    "folder" => "product",
    "transformation"=>array(
    array("height"=>400, "width"=>400, "crop"=>"crop"),
    array("width"=>200, "crop"=>"scale")
    )));
  $url = $data["secure_url"];
  $publicid = $data["public_id"];
  if($url ==""){
    //cloud error
    echo "clouldError";
  }
  else{
    $query = "INSERT INTO `product` (`name`, `price`, `dis`, `movie_name`, `public_id`, `url`, `details`, `type`) VALUES
     ('$pname', '$price', '$disPrice', '$movie', '$publicid', '$url', '$pdet', '$type')";
     $statement = $connection->prepare($query);
     $run = $statement->execute();
     if($run){
      echo "done";
     }
  }
?>