<?php
    require "../../config/pdoconfig.php";
    $id = $_POST['id'];
    $query = "select * from trailer where id = '$id'";
    $statement = $connection->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();
$output = '';
foreach ($result as $row) {
    $output .= '
    <input type="number" value='.$row['id'].' id="id1" hidden>
    <div class="form-group">
    <label for="exampleSelectGender">Trailor Name</label>
    <input type="text" name="name1" id="name1" placeholder="Name" value ='.$row['name'].'
      class="form-control text-white" required>
</div>
<div class="form-group">
    <label for="exampleSelectGender">Trailor Url</label>
    <input type="url" name="url1" id="url1" placeholder="Url" value='.$row['url'].'
      class="form-control text-white" required>
</div>
 <button type="button" class="btn btn-success btn-icon-text" id="submit1">
   <i class=" mdi mdi-file-check btn-icon-prepend"></i> Upload </button>
    ';
}
echo $output;
?>