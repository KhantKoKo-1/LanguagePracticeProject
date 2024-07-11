<?php

function get_all_types($mysqli)
{
    $sql = "SELECT * FROM `type`";
    $result = $mysqli->query($sql);
    return $result;
}

function get_type_by_id($mysqli, $c_id)
{
    $sql = "SELECT * FROM `costomer` WHERE `c_id`=$c_id";
    $result = $mysqli->query($sql);
    if ($result)  return $result->fetch_assoc();
}

function get_type_by_email($mysqli, $email)
{
    $sql = "SELECT * FROM `type` WHERE `email`='$email'";
    $result = $mysqli->query($sql);
    if ($result) return $result->fetch_assoc();
}

function update_type($mysqli, $c_id, $c_name, $email, $address, $password)
{
    $sql = "UPDATE `type` SET `c_name`='$c_name', `email`='$email',`address`='$address',`password`='$password' WHERE `c_id`=$c_id";
    if ($mysqli->query($sql)) {
        return true;
    }
    return false;
}

function save_type($mysqli, $name, $created_by, $created_at){
    $sql = "INSERT INTO `type`(`type_name`, `created_by`, `created_at`) VALUES ('$name', $created_by, '$created_at')";
    if($mysqli->query($sql)){
        return true;
    }
    return false;
}

function delete_type($mysqli, $c_id)
{
    $sql = "DELETE FROM `type`  WHERE `c_id`=$c_id";
    if ($mysqli->query($sql)) {
        return true;
    }
    return false;
}
