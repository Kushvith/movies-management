<?php
$connection = new PDO("mysql:host=localhost;dbname=movies", "root", "");

if (!$connection) {
  echo " unable connect to data base";
}

?>