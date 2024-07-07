<?php
$base_dir = __DIR__;
require_once($base_dir . '/z_db_seeder.php');
require_once($base_dir . '/user_db.php');
$mysqli = new mysqli("localhost", "root", "");

if ($mysqli->connect_error) {
    echo "Error occuring";
}

function create_db($mysqli)
{
    $sql = "CREATE DATABASE IF NOT EXISTS quizz";
    if ($mysqli->query($sql)) {
        return true;
    }
    return false;
}

function select_db($mysqli)
{
    if ($mysqli->select_db("quizz")) {
        return true;
    }
    return false;
}

function create_table($mysqli)
{
    $sql = "CREATE TABLE IF NOT EXISTS `user` (
        `u_id` INT AUTO_INCREMENT PRIMARY KEY,
        `u_name` VARCHAR(20) NOT NULL,
        `u_email` VARCHAR(45) NOT NULL UNIQUE,
        -- `u_address` VARCHAR(255) NOT NULL,
        `u_password` VARCHAR(255) NOT NULL,
        `role` TINYINT NOT NULL DEFAULT 1 COMMENT '0 for admin, 0 for user',
        `created_by` INT DEFAULT 0 COMMENT '0 for created by user',
        `created_at` DATETIME NOT NULL,
        `updated_by` INT DEFAULT NULL,
        `updated_at` DATETIME DEFAULT NULL,
        `deleted_by` INT DEFAULT NULL,
        `deleted_at` DATETIME DEFAULT NULL
    )";

    if ($mysqli->query($sql) === FALSE) {
        echo "Error creating table: " . $mysqli->error;
    }


    $sql = "CREATE TABLE IF NOT EXISTS `level`(
        `level_id` INT AUTO_INCREMENT , 
        `level_name` VARCHAR (20) NOT NULL,
        `created_by` INT NOT NULL,
        `created_at` DateTime NOT NULL,
        `updated_by` INT DEFAULT NULL,
        `updated_at` DateTime DEFAULT NULL,
        `deleted_by` INT DEFAULT NULL,
        `deleted_at` DateTime DEFAULT NULL,
        PRIMARY KEY(`level_id`)
        ) ";

    if ($mysqli->query($sql) === false) return false;

    $sql = "CREATE TABLE IF NOT EXISTS `type`(
        `type_id` INT AUTO_INCREMENT , 
        `name` VARCHAR (255) NOT NULL,
        `created_by` INT NOT NULL,
        `created_at` DateTime NOT NULL,
        `updated_by` INT DEFAULT NULL,
        `updated_at` DateTime DEFAULT NULL,
        `deleted_by` INT DEFAULT NULL,
        `deleted_at` DateTime DEFAULT NULL,
         PRIMARY KEY(`type_id`)
        ) ";

    if ($mysqli->query($sql) === false) return false;

    $sql = "CREATE TABLE IF NOT EXISTS `quizz`(
        `q_id` INT AUTO_INCREMENT,
        `level_id` INT NOT NULL,
        `type_id` INT NOT NULL,
        `description` VARCHAR(255) NOT NULL,
        `created_by` INT NOT NULL,
        `created_at` DateTime NOT NULL,
        `updated_by` INT DEFAULT NULL,
        `updated_at` DateTime DEFAULT NULL,
        `deleted_by` INT DEFAULT NULL,
        `deleted_at` DateTime DEFAULT NULL,
         PRIMARY KEY(`q_id`),
         FOREIGN KEY(`level_id`) REFERENCES `level`(`level_id`),
        FOREIGN KEY(`type_id`) REFERENCES `type`(`type_id`) 
        )";
        if($mysqli->query($sql)===false) return false;
}


create_db($mysqli);
select_db($mysqli);
create_table($mysqli);
$count = count_user($mysqli);

if ($count == 0) {
    run_seeder($mysqli);
}


?>
