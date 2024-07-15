<?php
$title = 'Create Account';
require_once ("../../../layout/admin/header.php");
require_once ("../../../layout/admin/sidebar.php");
require_once ("../../../layout/admin/nav.php");
require_once("../../../config/user_db.php");

$user_name = $role = $email = $password = $comfirm_password =  "";
$user_name_err = $role_err = $email_err = $password_err =  $comfirm_password_err = "";

$validate = true;
$invalid  = false;
$success  = false;
$invalid_err     = "";
$success_message = "";

if (isset($_POST['register']) && $_POST['register'] == 2) {
  $user_name = $mysqli->real_escape_string($_POST["username"]); 
  $email     = $mysqli->real_escape_string($_POST["email"]);
  $role      = isset($_POST["role"]) ? $_POST["role"] : '';
  $password  = $mysqli->real_escape_string($_POST["password"]);
  $comfirm_password = $mysqli->real_escape_string($_POST["comfirm_password"]);

  if ($user_name === "") {
    $validate = false;
    $user_name_err = "Email must not be blank!";
  }

  if ($email === "") {
    $validate  = false;
    $email_err = "Email must not be blank!";
  } else {
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $validate     = false;
      $email_err = "Please fill vaild email!";
    }
  }

  if ($password === "") {
    $validate = false;
    $password_err = "Password must not be blank!";
  }

  if ($role === "") {
      $validate = false;
      $role_err = "Please Choose Role!";
  }

  if ($comfirm_password === "") {
      $validate = false;
      $comfirm_password_err = "Comfirm password must not be blank!";
  }

  if ($password !== $comfirm_password) {
    $validate = false;
    $comfirm_password_err = "[ Password ] and [ Comfirm Password ] must be same!";
  }
  if ($validate) {
      $hash_password = password_hash($password, PASSWORD_DEFAULT);
      try {
        $result = save_user($mysqli, $user_name, $email, $hash_password, $user_id);
        if($result) {
            $success = true;
            $success_message = "Create Account Successful!";
        }
      }
      catch (Exception $e) {
        // Handle exceptions (e.g., duplicate entry error)
        if ($e->getCode() === '23000') {
            $invalid_err = "Duplicate entry error. This email or username is already taken.";
        } else {
            $invalid_err = "An error occurred: " . $e->getMessage();
        }
        $error = true;
        $invalid = true;
    }
    
    }
    }


?>

<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Create Accounts</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="<?php echo $admin_base_url . 'dashboard/' ?>">Dashboard</a></li>
                    <li class="active">Create Accounts</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- <div class="row"> -->
<div class="content mt-3">
    <div class="animated fadeIn">
        <?php if ($success) { ?>
        <div class="alert alert-success mx-auto" role="alert">
            <div class="d-flex justify-content-center">
                <?php echo $success_message ?>
            </div>
        </div>
        <?php } ?>

        <?php if ($invalid) { ?>
        <div class="alert alert-danger mx-auto" role="alert">
            <div class="d-flex justify-content-center">
                <?php echo $invalid_err ?>
            </div>
        </div>
        <?php } ?>
        <div class="card">
            <div class="card-header d-flex justify-content-center fw-bold">Create Account Form</div>
            <div class="card-body card-block">
                <form action="" method="post" class="">
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                <input type="text" id="username" name="username" placeholder="Username"
                                    class="form-control" value="<?php echo $user_name ?>">
                            </div>
                            <?php if (!$validate) { ?>
                                <span class="help-block text-danger"><?php echo $user_name_err ?></span>
                            <?php } ?>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-envelope"></i></div>
                            <input type="text" id="email" name="email" placeholder="Email" class="form-control" value="<?php echo $email ?>">
                        </div>
                        <?php if (!$validate) { ?>
                            <span class="help-block text-danger"><?php echo $email_err ?></span>
                        <?php } ?>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-asterisk"></i></div>
                            <input type="password" id="password" name="password" placeholder="Password"
                                class="form-control" value="<?php echo $password ?>">
                        </div>
                        <?php if (!$validate) { ?>
                            <span class="help-block text-danger"><?php echo $password_err ?></span>
                        <?php } ?>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-asterisk"></i></div>
                            <input type="password" id="password" name="comfirm_password" placeholder="comfirm_password"
                                class="form-control" value="<?php echo $comfirm_password ?>">
                        </div>
                        <?php if (!$validate) { ?>
                            <span class="help-block text-danger"><?php echo $comfirm_password_err ?></span>
                        <?php } ?>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="form-check-inline form-check">
                                <label for="admin" class="form-check-label ">
                                <input type="radio" id="admin" name="role" value="<?php echo $admin_role ?>"
                                class="form-check-input" <?php echo ($role == $admin_role) ? 'checked' : ''; ?>>Admin
                                </label>
                                &nbsp;&nbsp;
                                <label for="user" class="form-check-label ">
                                    <input type="radio" id="user" name="role" value="<?php echo $user_role?>"
                                        class="form-check-input" <?php echo ($role == $user_role) ? 'checked' : ''; ?>>User
                                </label>
                            </div>
                            <?php if (!$validate) { ?>
                                <span class="help-block text-danger"><?php echo $role_err ?></span>
                            <?php } ?>
                        </div>
                        </br>
                        <div class="form-actions form-group">
                            <button type="submit" name="register" value="2"
                                class="btn btn-success btn-sm">Create</button>
                            <button type="reset" id="resetBtn" class="btn btn-danger btn-sm">
                                <i class="fa fa-ban"></i> Reset
                            </button>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
<?php
require_once ("../../../layout/admin/footer.php");
?>

</body>

</html>