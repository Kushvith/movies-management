<?php
require "../../config/pdoconfig.php";
if(isset($_POST['t_id']) && isset($_POST['m_id'])){
    $t_id = $_POST['t_id'];
    $m_id = $_POST['m_id'];
    $query = "select * from shows where movie_id = '$m_id' and theatre_id = '$t_id'";
    $statement = $connection->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();
    if($result)
    {
        foreach($result as $row){
            ?>
            <select name="show-date">
                <option value="">select show-date</option>
                <option value="<?php echo $row['id'];?>"><?php echo $row['show_date']; ?></option>
            </select>
            <?php
        }
    }
}

?>