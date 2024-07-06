<?php

function get_user_by_email($mysqli, $email)
{
    $sql = "SELECT * FROM user WHERE user.u_email = '$email'";
    $result = $mysqli->query($sql);

    return $result->fetch_assoc();
}

function save_user($mysqli, $c_name, $email, $password , $role = 1)
{
    $sql = "INSERT INTO `user`(`u_name`,`u_email`,`u_password`, `role`) VALUES ('$c_name','$email','$password',$role)";
    if ($mysqli->query($sql)) {
        return true;
    }
    return false;
}
