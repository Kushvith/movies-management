<?php
    require "./vendor/autoload.php";
    require "../../config/pdoconfig.php";
    use Cloudinary\Api\Upload\UploadApi;
    require './config-cloud.php';

$id = $_POST['id'];
$fname =   $_POST['fname'];
$type =   $_POST['type'];
$dob =   $_POST['dob'];
$directedno =   $_POST['actedno'];
$place =   $_POST['place'];
$gender =   $_POST['gender'];
$details =   $_POST['details'];
    if(isset($_FILES["fileimg"]["tmp_name"] )){
    $filename = $_FILES["fileimg"]["tmp_name"];
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
    $data =  (new UploadApi())->upload($filename,array(
        "folder" => "crew",
        "transformation"=>array(
        array("gravity"=>"face", "height"=>400, "width"=>400, "crop"=>"crop"),
        array("radius"=>"max"),
        array("width"=>200, "crop"=>"scale")
        )));
      $url = $data["secure_url"];
      $publicid = $data["public_id"];
    $query1 = "UPDATE director SET name='$fname',type='$type',dob='$dob',
    place=' $place',details='$details',`gender`='$gender',directed_no='$directedno',url='$url',publicid='$publicid' WHERE id = '$id'";
   $statement1 = $connection->prepare($query1);
     $statement1->execute();
        echo "done";
    
    }
    else{
        $query2 = "UPDATE director SET name='$fname',type='$type',dob='$dob',
        place=' $place',details='$details',`gender`='$gender',directed_no='$directedno' WHERE id = '$id'";   
        $statement2 = $connection->prepare($query2);
        $result2 = $statement2->execute();
        if($result2){
            echo "done";
        } 
    }

?>