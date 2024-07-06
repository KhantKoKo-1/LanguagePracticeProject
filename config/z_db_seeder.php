<?php

function run_seeder($mysqli) {
   try{
      $password = "password";
      $hash_password = password_hash($password, PASSWORD_DEFAULT);
      $admin_sql = "INSERT INTO `user`(`u_name`,`u_email`,`u_password`,`role`) VALUES ('admin','admin@gmail.com','$hash_password',0)";
      $user_sql = "INSERT INTO `user`(`u_name`,`u_email`,`u_password`,`role`) VALUES ('user','user@gmail.com','$hash_password',1)";
      
      if ($mysqli->query($admin_sql) == false) {
         echo "Database seeder have error!";
      }
      if ($mysqli->query($user_sql) == false) {
         echo "Database seeder have error!";
      }
   }catch(Exception $e){
      error_log("Error: " . $e->getMessage(), 0);
   }
   
}
