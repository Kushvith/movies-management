<?php
require "../../config/pdoconfig.php";
$id = $_POST['id'];
$query1 = "DELETE FROM product WHERE id = '$id'";
$statement1 = $connection->prepare($query1);
$statement1->execute();
echo "done";
?>