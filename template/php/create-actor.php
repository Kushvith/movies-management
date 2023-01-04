<?php
    require "./vendor/autoload.php";
    require "../../config/pdoconfig.php";
    use Cloudinary\Api\Upload\UploadApi;
    require './config-cloud.php';
   $fname =   $_POST['fname'];
   $sname =   $_POST['sname'];
   $dob =   $_POST['dob'];
   $actedno =   $_POST['actedno'];
   $place =   $_POST['place'];
   $gender =   $_POST['gender'];
   $filename = $_FILES["fileimg"]["tmp_name"]; 
   $details =   $_POST['details'];

    $query = "select  COUNT(*) from actors WHERE fname = '$fname' and lname = '$sname'";
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
    "folder" => "actor",
    "transformation"=>array(
    array("gravity"=>"face", "height"=>200, "width"=>200, "crop"=>"crop"),
    array("width"=>200, "crop"=>"scale")
    )));
  $url = $data["secure_url"];
  $publicid = $data["public_id"];
  if($url ==""){
    //cloud error
    echo "clouldError";
  }
  else{
    $query = "insert into actors
    ( fname, lname, dob, place, details, gender, movies_acted,url,	publicid)
     values
     ('$fname','$sname','$dob','$place','$details','$gender','$actedno','$url','$publicid')";
     $statement = $connection->prepare($query);
     $run = $statement->execute();
     if($run){
      echo "done";
     }
  }
   

}
   
// echo "url =" . $data["secure_url"];
// echo "public id" . $data["public_id"];

?>