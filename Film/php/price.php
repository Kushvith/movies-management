<?php 
require "../../config/pdoconfig.php";
if (isset($_POST['t_id']) && isset($_POST['m_id']) && isset($_POST['s_id']) && isset($_POST['val'])) {
    $t_id = $_POST['t_id'];
    $m_id = $_POST['m_id'];
    $s_id = $_POST['s_id'];
    $query = "select * from shows where movie_id = '$m_id' and theatre_id = '$t_id' and id = '$s_id'";
    $statement = $connection->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();
    if ($result) {
        foreach ($result as $row) {
            echo (intval($_POST['val']) * intval($row['price']));
        }
    }
}

?>