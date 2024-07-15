<?php

function get_all_levels($mysqli)
{
    $sql = "SELECT * FROM `level` WHERE `deleted_by` IS NULL";
    $results = $mysqli->query($sql);
    return $results;
}

function get_level_by_id($mysqli, $c_id)
{
    $sql = "SELECT * FROM `costomer` WHERE `c_id`=$c_id";
    $result = $mysqli->query($sql);
    if ($result)  return $result->fetch_assoc();
}

function update_level($mysqli, $c_id, $c_name, $email, $address, $password)
{
    $sql = "UPDATE `level` SET `c_name`='$c_name', `email`='$email',`address`='$address',`password`='$password' WHERE `c_id`=$c_id";
    if ($mysqli->query($sql)) {
        return true;
    }
    return false;
}

function save_level($mysqli, $name, $created_by){
    $currentDateTime = date('Y-m-d H:i:s');
    $sql = "INSERT INTO `level`(`level_name`, `created_by`, `created_at`) VALUES ('$name', $created_by, '$currentDateTime')";
    if($mysqli->query($sql)){
        return true;
    }
    return false;
}

function delete_level($mysqli, $c_id)
{
    $sql = "DELETE FROM `level`  WHERE `c_id`=$c_id";
    if ($mysqli->query($sql)) {
        return true;
    }
    return false;
}