<?php
$title = 'Dashboard';
require_once ("../../../layout/admin/header.php");
require_once ("../../../layout/admin/sidebar.php");
require_once ("../../../layout/admin/nav.php");
?>
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Create Type</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="<?php echo $admin_base_url . 'dashboard/' ?>">Dashboard</a></li>
                    <li class="active">Create Type</li>
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
                <strong>Type &nbsp;</strong> Form
            </div>
            <div class="card-body card-block">
                <form action="" method="post" class="form-horizontal">
                    <div class="row form-group">
                        <div class="col col-md-2 offset-2 mt-2 bold"><label for="type_name" class="form-control-label">Type Name</label></div>
                        <div class="col-6 col-md-6"><input type="text" id="type_name" name="type_name"
                                placeholder="Enter Type Name" class="form-control">
                            <span class="help-block text-danger">Please Enter Type Name</span></div>
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