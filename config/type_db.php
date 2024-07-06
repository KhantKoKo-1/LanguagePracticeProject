<?php 
function get_all_types($mysqli)
{
    $sql = "SELECT * FROM `type`";
    $result = $mysqli->query($sql);
    return $result;
}
?>