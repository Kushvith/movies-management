<?php
require "../../config/pdoconfig.php";
if(isset($_POST['t_id']) && isset($_POST['m_id']) && isset($_POST['s_id']))
{
    $t_id = $_POST['t_id'];
    $m_id = $_POST['m_id'];
    $s_id = $_POST['s_id'];
    $query = "select * from shows where movie_id = '$m_id' and theatre_id = '$t_id' and id = '$s_id'";
    $statement = $connection->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();
    if ($result) {
        foreach ($result as $row) {
            $morning = 0;
            $afternoon = 0;
            $evening = 0;
            echo json_encode($result);
            if($row['morning'] == 1){
                echo 1;
                $morning = 1;
            }
           if($row['afternoon'] == 1){
                $afternoon = 1;
            }
            if($row['evening'] == 1){
                $evening = 1;
            }
            ?>
             <select name="show-time">
                <option value="">select show-time</option>
                <?php if ($morning == 1) { ?>
                <option value="<?php if ($morning == 1) {
                echo 'morning';
                } ?>"><?php if ($morning == 1) {
                     echo "Morning";
                 }
            ?></option>
    <?php    } ?>
    <?php if ($afternoon == 1) { ?>
            <option value="<?php if ($afternoon == 1) {
                echo 'afternoon';
            } ?>"><?php if ($afternoon == 1) {
                echo "Afternoon";}
            ?></option>
    <?php    } ?>
    <?php if ($evening == 1) { ?>
             <option value="<?php if ($evening == 1) {
                echo 'evening';
            } ?>"><?php if ($evening == 1) {
                echo "Night";}
            ?></option>
            </select>
            <?php    } ?>
            <?php
        }
    }
}

?>
