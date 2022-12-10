<?php
    require "../../config/pdoconfig.php";
    $id = $_POST['id'];
$name =   $_POST['name'];
$url =   $_POST['url'];
$query2 = "UPDATE director SET name='$name',url='$url' WHERE id = '$id'";   
        $statement2 = $connection->prepare($query2);
        $result2 = $statement2->execute();
        if($result2){
            echo "done";
        } 
?>