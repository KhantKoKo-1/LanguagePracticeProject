<?php
$title = 'Level Form';
require_once ("../../../layout/admin/header.php");
require_once ("../../../layout/admin/sidebar.php");
require_once ("../../../layout/admin/nav.php");
?>
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Create Level</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="<?php echo $admin_base_url . 'dashboard/' ?>">Dashboard</a></li>
                    <li class="active">Create Level</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- <div class="row"> -->
<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row justify-content-center">
            <div class="card w-75 mt-5">
                <div class="card-header d-flex justify-content-center">
                    <strong>Level &nbsp;</strong> Form
                </div>
                <div class="card-body card-block">
                    <form action="" method="post" class="form-horizontal">
                        <div class="row form-group">
                            <div class="col col-md-2 offset-2 mt-2 bold"><label for="level_name"
                                    class="form-control-label">Level Name</label></div>
                            <div class="col-6 col-md-6"><input type="text" id="level_name" name="level_name"
                                    placeholder="Enter Level Name" class="form-control">
                                <span class="help-block text-danger">Please Enter Level Name</span>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-footer d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary btn-sm">
                        <i class="fa fa-dot-circle-o"></i> Submit
                    </button>
                    <span>&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <button type="reset" class="btn btn-danger btn-sm">
                        <i class="fa fa-ban"></i> Reset
                    </button>
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