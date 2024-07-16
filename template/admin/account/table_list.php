<?php
$title = 'Dashboard';
require_once ("../../../layout/admin/header.php");
require_once ("../../../layout/admin/sidebar.php");
require_once ("../../../layout/admin/nav.php");
require_once("../../../config/user_db.php");

$users = get_all_users($mysqli);
$i = 0;
$success = false;
$error   = false;
$success_message = $error_message = "";

if (isset($_GET['msg'])) {
    $success = true;
    switch ($_GET['msg']) {
        case 'create':
            $success_message = 'User create is success'; 
            break;
        case 'edit':
            $success_message = 'User update is success'; 
            break;
        case 'delete':
            $success_message = 'User delete is success'; 
            break;
        default:
            // Default case or additional handling
            break;
    }
}

if (isset($_GET['err'])) {
  $error = true;
  switch ($_GET['err']) {
      case 'create':
          $error_message = 'User create is fail'; 
          break;
      case 'edit':
          $error_message = 'User update is fail'; 
          break;
      case 'delete':
          $error_message = 'User delete is fail'; 
          break;
      default:
          // Default case or additional handling
          break;
  }
}

?>

<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Dashboard</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="<?php echo $admin_base_url . 'dashboard/' ?>">Dashboard</a></li>
                    <li class="active">Account table List</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Data Table</strong>
                    </div>
                    <div class="card-body">
                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php while ($user = $users->fetch_assoc()) {
                                $user_id        = $user['user_id'];
                                $edit_url       = $admin_base_url . "account/index.php?user_id=" . $user_id;
                                $delete_url     = $admin_base_url . "account/account_delete.php?user_id=" . $user_id;
                                $change_pwd_url = $admin_base_url . "account/index.php?user_id=" . $user_id . "&type=change";  
                                ?>
                                
                                <tr>
                                    <td><?php echo $i + 1 ?></td>
                                    <td><?php echo $user['name']; ?></td>
                                    <td><?php echo $user['email']; ?></td>
                                    <td><?php if( $user['role'] == $user_role ){
                                        echo '<span class="badge badge-pill badge-info">user</span>';
                                    } else {
                                        echo '<span class="badge badge-pill badge-success">admin</span>';
                                    } ?></td>
                                    <td>
                                        <a href="<?php echo $edit_url?>" class="btn btn-info btn-sm"><i class="fa fa-pencil"></i> Edit </a>
                                        <a href="javascript:void(0)" class="btn btn-danger btn-sm" onclick="confirmDelete('<?php echo $delete_url; ?>')">
                                            <i class="fa fa-trash-o"></i> Delete
                                        </a>
                                        <a href="<?php echo $change_pwd_url?>" class="btn btn-primary btn-sm"><i class="fa fa-arrows"></i>Change Password</a>
                                    </td>
                                </tr>
                            <?php $i++; } ?>    
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


        </div>
    </div><!-- .animated -->
</div><!-- .content -->

<?php
require_once ("../../../layout/admin/footer.php");
?>

</body>

</html>