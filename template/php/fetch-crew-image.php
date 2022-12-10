<?php
require "../../config/pdoconfig.php";
$id = $_POST['id'];
$query = "select * from director where id = '$id'";
$statement = $connection->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
foreach($result as $row)
{
    echo '
    <div class="card">
    <img class="card-img-top" src="'.$row['url'].'" alt="Card image cap">
    <div class="card-body">
      <p class="card-text">
        '.$row['details'].'
      </p>
    </div>
  </div>
    ';
}
?>