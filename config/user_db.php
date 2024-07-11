<?php

function count_user($mysqli)
{
    $sql = "SELECT * FROM `users`";
    $result = $mysqli->query($sql);
    $num_row = 0;
    if ($result) {
        $num_row = $result->num_rows;
    }
    return $num_row;
}

function get_user_by_email($mysqli, $email)
{
    $sql = "SELECT * FROM `users` WHERE users.email = '$email'";
    $result = $mysqli->query($sql);

    return $result->fetch_assoc();
}

function save_user($mysqli, $c_name, $email, $password , $role = 1 ,$created_by = 0)
{
    $currentDateTime = date('Y-m-d H:i:s');
    $sql = "INSERT INTO `users`(`name`,`email`,`password`, `role`, `created_by`, `created_at`) VALUES ('$c_name','$email','$password',$role,$created_by,'$currentDateTime')";
    if ($mysqli->query($sql)) {
        return true;
    }
    return false;
}

