<?php

if(isset($_POST['name'])){
    require "../../config/pdoconfig.php";
    $name = $_POST['name'];
    $place = $_POST['place'];
    $totalcapacity = $_POST['totalcapacity'];
    for($count=0; $count < count($name); $count++)
    {
       $query = "SELECT * FROM theatre WHERE name = '".$name[$count]."'";
       $statement = $connection->prepare($query);
        $statement->execute();
        $result = $statement->rowCount();
        if($result>0){
                    echo "theatre exists of '".$name[$count]."'<br>";
        }else{
        $query = "INSERT INTO theatre (name , place,totalcapacity) VALUES ('".$name[$count]."','".$place[$count]."','".$totalcapacity[$count]."')";
            $statement = $connection->prepare($query);
            $statement->execute();
            echo "done"."theatre created"."  ".$name[$count]."<br>";
        }
    }
   
}
?>