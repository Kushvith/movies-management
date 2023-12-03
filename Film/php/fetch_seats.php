<?php
require "../../config/pdoconfig.php";
$t_id = $_POST['t_id'];
$s_id = $_POST['s_id'];
$s_time = $_POST['s_time'];
$m_id = $_POST['m_id'];
$email = $_POST['email'];
$query1 = 'SELECT * from theatre where id = '.$t_id.'';
$statement = $connection->prepare($query1);
$statement->execute();
$result = $statement->fetchAll();
if ($result) {

    foreach ($result as $row) {
        $totalseats = $row['totalcapacity'];
    }
}

$array1 = array();
$query2 = "select * from tickets where m_id = '$m_id' and t_id='$t_id' and s_id='$s_id'";
$statement = $connection->prepare($query2);
$statement->execute();
$result = $statement->fetchAll();
if ($result) {
    foreach ($result as $row) {

        $array1[] = $row['seats'];
    }
}
$array2 = array();
foreach($array1 as $val){
    $array2[] = explode(",",$val);
}
$arr3 = array();
for($j=0;$j<sizeof($array2);$j++) {
    for($i=0;$i<sizeof($array2[$j]);$i++){
        $arr3[] = strval($array2[$j][$i]);
        
    }
}

$output = "";
$check = false;
$rows = floor(intval($totalseats)/10);
for($i=1;$i <=$rows;$i++){
    for($j=1;$j<=10;$j++){
      foreach($arr3 as $value){
        if(("R".$i."S".$j) == $value){
        $check = true;
        }
      }
       if($check){
        $check = false;
                    $output .= '
        <div class="text-center col-md-2" style="margin:10px;background-color:red;color:white">
        <input type="checkbox" id="seat" value="R'.$i."S".$j.'" name="seat[]" style="margin:10px" disabled="true"/>R'.$i."S".$j.'
        </div>
        
        ';
        }
        else{
            $output .= '
        <div class="text-center col-md-2" style="margin:10px;background-color:grey;color:white">
        <input type="checkbox" id="seat" value="R'.$i."S".$j.'" name="seat[]" style="margin:10px" />R'.$i."S".$j.'
        </div>
        
        ';
        }

    }
}
echo $output;
?>