<?php
    require "./vendor/autoload.php";
    require "../../config/pdoconfig.php";
    use Cloudinary\Api\Upload\UploadApi;
    require './config-cloud.php';
   $name =   $_POST['name'];
   $imdbrat =   $_POST['imdbrat'];
   $runtime =   $_POST['runtime'];
   $releaseyear =   $_POST['releaseyear'];
   $genre =   $_POST['genre'];
   $mmpa =   $_POST['mmpa'];
   $actor =   $_POST['actor'];
   $actor1 =   $_POST['actor1'];
   $actor2 =   $_POST['actor2'];
   $actor3 =   $_POST['actor3'];
   $director =   $_POST['director'];
   $music =   $_POST['music'];
   $producer =   $_POST['producer'];
   $trailer =   $_POST['trailer'];
   $filename = $_FILES["fileimg"]["tmp_name"]; 
   $details =   $_POST['summernote'];

    $query = "select  COUNT(*) from movie WHERE name = '$name' ";
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
    "folder" => "movie",
    "transformation"=>array(
    array( "height"=>500, "width"=>400, "crop"=>"crop"),
    array("width"=>200, "crop"=>"scale")
    )));
  $url = $data["secure_url"];
  $publicid = $data["public_id"];
  if($url ==""){
    //cloud error
    echo "clouldError";
  }
  else{
    $query = "insert into movie 
    (  `name`, `imdb_ratings`, `runtime`, `mmpa`, `releaseyear`, `description`,
     `director`, `producer`, `musicdirector`,
     `trailer`, `actor`, `actor1`, `actor2`, `actor3`, `genre`, `url`, `publicid`)
     values
     ('$name','$imdbrat','$runtime','$mmpa','$releaseyear','$details','$director','$producer',
     '$music','$trailer','$actor','$actor1','$actor2','$actor3','$genre','$url','$publicid')";
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