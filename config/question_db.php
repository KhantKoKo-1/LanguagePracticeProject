<?php
function save_level($mysqli){
    $sql = "INSERT INTO `level`(`level_id`,`level_name`,`description`) VALUES ('1','N5')";
    if($mysqli->query($sql)){
        return true;
    }
    return false;
}
function save_question($mysqli,$quizz_id,){
    $sql = "INSERT INTO `item`(`i_name`,`price`,`qty`,`b_id`,`description`) VALUES ('$i_name',$price,$qty,$b_id,'$description')";
    if($mysqli->query($sql)){
        return true;
    }
    return false;
}


?>