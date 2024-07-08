<?php

function count_user($mysqli)
{
    $sql = "SELECT * FROM `user`";
    $result = $mysqli->query($sql);
    $num_row = 0;
    if ($result) {
        $num_row = $result->num_rows;
    }
    return $num_row;
}

function get_user_by_email($mysqli, $email)
{
    $sql = "SELECT * FROM `user` WHERE user.u_email = '$email'";
    $result = $mysqli->query($sql);

    return $result->fetch_assoc();
}

function save_user($mysqli, $c_name, $email, $password , $role = 1 ,$created_by = 0)
{
    $currentDateTime = date('Y-m-d H:i:s');
    $sql = "INSERT INTO `user`(`u_name`,`u_email`,`u_password`, `role`, `created_by`, `created_at`) VALUES ('$c_name','$email','$password',$role,$created_by,'$currentDateTime')";
    if ($mysqli->query($sql)) {
        return true;
    }
    return false;
}

