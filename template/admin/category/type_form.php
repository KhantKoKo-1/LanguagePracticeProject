<?php

if(isset($_GET['type_id'])) {
    $title = 'Edit Level Form';
 } else {
    $title = 'Create Level Form';
 }

require_once ("../../../layout/admin/header.php");
require_once ("../../../layout/admin/sidebar.php");
require_once ("../../../layout/admin/nav.php");
require_once ("../../../config/type_db.php");

$type_name       =  "";
$type_err        =  "";
$error_message   =  "";
$success_message =  "";
$success         = false;
$error           = false;

if(isset($_GET['type_id'])) {
    $type_id = $_GET['type_id'];
    $title = 'Edit Level Form';
    $type_data = get_type_by_id($mysqli, $type_id);
    $type_name  =  $type_data['type_name'];
 } else { 
    $type_id = '';
    $title = 'Create Level Form';
 }

if (isset($_POST['Submit']) && $_POST['Submit'] == 1) {
    $type_name = $mysqli->real_escape_string($_POST["type_name"]);
    if ($type_name == "") {
        $type_err = "Please Enter Type Name!"; 
        $error = true;
    }

    if ($error == false) {
        try {
            $check_type_name_exist = get_type_by_name($mysqli, $type_name, $type_id);
            if ($check_type_name_exist) {
                $error = true;
                $error_message = "This Type Name is already taken."; 
            } else{
            if ($type_id != '') {
                $result = update_type($mysqli, $type_name, $user_id, $type_id);
                if ($result) {
                  $success = true;
                  $success_message = "Edit Level Successful!";
              }
              } else {
            $result = save_type($mysqli, $type_name, $user_id);
        if ($result) {
            $success = true;
            $success_message = "Create Type Successful!";
        }
    }
    }
    }
        catch (Exception $e) {
            // Handle exceptions (e.g., duplicate entry error)
            $error_message = $e->getMessage();
            $error = true;
        }
    }
}

?>
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Create Type Form</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="<?php echo $admin_base_url . 'dashboard/' ?>">Dashboard</a></li>
                    <li class="active"><?php echo $title; ?></li>
                </ol>
            </div>
        </div>
    </div>
</div>


<div class="content mt-3">
    <div class="animated fadeIn">
        <!-- <div class="row"> -->
        <?php if ($success) { ?>
        <div class="alert alert-success w-75 mx-auto" role="alert">
            <div class="d-flex justify-content-center">
                <?php echo $success_message ?>
            </div>
        </div>
        <?php } ?>

        <?php if ($error) { ?>
        <div class="alert alert-danger w-75 mx-auto" role="alert">
            <div class="d-flex justify-content-center">
                <?php echo $error_message ?>
            </div>
        </div>
        <?php } ?>

        <div class="row justify-content-center">
            <div class="card w-75 mt-5">
                <div class="card-header d-flex justify-content-center">
                    <strong>Type &nbsp;</strong> Form
                </div>
                <form action="" method="post" class="form-horizontal">
                    <div class="card-body card-block">
                        <div class="row form-group">
                            <div class="col col-md-2 offset-2 mt-2 bold">
                                <label for="type_name" class="form-control-label">Type Name</label>
                            </div>
                            <div class="col-6 col-md-6">
                                <input type="text" id="type_name" name="type_name" placeholder="Enter type Name"
                                    class="form-control" value="<?php echo $type_name; ?>">
                                <?php if ($type_err !== '') { ?>
                                <span class="help-block text-danger"><?php echo $type_err; ?></span>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-center">
                        <button type="submit" value="1" name="Submit" class="btn btn-primary btn-sm">
                            <i class="fa fa-dot-circle-o"></i>
                            <?php if($type_id == "") {
                                echo "Create";
                            } else {
                                echo "Edit";
                            }
                            ?>
                        </button>
                        <span>&nbsp;&nbsp;&nbsp;&nbsp;</span>
                        <button type="reset" id="resetBtn" class="btn btn-danger btn-sm">
                            <i class="fa fa-ban"></i> Reset
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
<?php
require_once ("../../../layout/admin/footer.php");
?>

</body>

</html>