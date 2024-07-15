<?php

function get_all_quizzes($mysqli)
{
    $sql = "SELECT * FROM `quiz` WHERE `deleted_by` IS NULL";
    $result = $mysqli->query($sql);
    return $result;
}


function update_quiz($mysqli, $c_id, $c_name, $email, $address, $password)
{
    $sql = "UPDATE `quiz` SET `c_name`='$c_name', `email`='$email',`address`='$address',`password`='$password' WHERE `c_id`=$c_id";
    if ($mysqli->query($sql)) {
        return true;
    }
    return false;
}

function save_quizzes($mysqli, $description, $is_correct, $question_id, $created_by){
    $currentDateTime = date('Y-m-d H:i:s');
    $sql = "INSERT INTO `quiz`(`description`, `is_correct`, `question_id`, `created_by`, `created_at`) VALUES ('$description', '$is_correct', $question_id, $created_by, '$currentDateTime')";
    if($mysqli->query($sql)){
        return true;
    }
    return false;
}

function delete_quiz($mysqli, $c_id)
{
    $sql = "DELETE FROM `quiz`  WHERE `c_id`=$c_id";
    if ($mysqli->query($sql)) {
        return true;
    }
    return false;
}
