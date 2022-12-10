<?php

require "./vendor/autoload.php";
require "../../config/pdoconfig.php";
use Cloudinary\Api\Upload\UploadApi;
require './config-cloud.php';

 $fname =   $_POST['fname'];
 $type =   $_POST['type'];
 $dob =   $_POST['dob'];
 $directedno =   $_POST['actedno'];
 $place =   $_POST['place'];
 $gender =   $_POST['gender'];
 $filename = $_FILES["fileimg"]["tmp_name"]; 
 $details =   $_POST['details'];
 $query = "select  COUNT(*) from director WHERE name = '$fname'";
    $statement = $connection->prepare($query);
    $statement->execute();
    $row_count =$statement->fetchColumn();

    if ($row_count > 0) {
        // actors already exits
        echo "exists";
      }
      else{
        // add here
        $data =  (new UploadApi())->upload($filename,array(
          "folder" => "crew",
          "transformation"=>array(
          array("gravity"=>"face", "height"=>400, "width"=>400, "crop"=>"crop"),
          array("radius"=>"max"),
          array("width"=>200, "crop"=>"scale")
          )));
        $url = $data["secure_url"];
        $publicid = $data["public_id"];
        if($url ==""){
          //cloud error
          echo "clouldError";
        }
        else{
          $query = "insert into director
          (  `name`, `type`, `details`, `dob`, `gender`, `directed_no`, `url`, `publicid`)
           values
           ('$fname','$type','$details','$dob','$gender','$directedno','$url','$publicid')";
           $statement = $connection->prepare($query);
           $run = $statement->execute();
           if($run){
            echo "done";
           }
        }
         
      
      }
?>