<?php
$title = 'Questions Form';
require_once ("../../../layout/admin/header.php");
require_once ("../../../layout/admin/sidebar.php");
require_once ("../../../layout/admin/nav.php");
?>
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Create Questions</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="<?php echo $admin_base_url . 'dashboard/' ?>">Dashboard</a></li>
                    <li class="active">Create Level/li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- <div class="row"> -->
<div class="content mt-3">
    <div class="animated fadeIn">
        <!-- <div class="row justify-content-center"> -->
        <div class="card">
            <div class="card-header d-flex justify-content-center">
                <strong>Questions &nbsp;</strong> Form
            </div>
            <div class="card-body card-block">
                <form action="" method="post" class="form-horizontal">
                    <div class="row form-group">
                        <div class="col col-md-2"><label for="description"
                                class="form-control-label">Description</label></div>
                        <div class="col col-md-9"><textarea name="textarea-input" id="textarea-input" rows="6"
                                placeholder="Content..." class="form-control"></textarea>
                            <!-- <span class="help-block">Please enter your Level Name</span> -->
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-2"><label for="level" class=" form-control-label">Level</label></div>
                        <div class="col-6 col-md-6">
                            <select name="level" id="level" class="form-control">
                                <option value="0" disabled>Please Select Level</option>
                                <option value="1"> N1 </option>
                                <option value="2"> N2 </option>
                                <option value="3"> N3 </option>
                                <option value="4"> N4 </option>
                                <option value="5"> N5 </option>
                            </select>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-2"><label for="type" class=" form-control-label">Type</label></div>
                        <div class="col-6 col-md-6">
                            <select name="type" id="type" class="form-control">
                                <option value="0" disabled>Please Select Type</option>
                                <option value="1"> Grammer </option>
                                <option value="2"> Vocabulary </option>
                                <option value="3"> Kenji </option>
                            </select>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-2"><label for="quiz" class=" form-control-label">
                                Add Quiz</label></div>
                        <div class="col-2 col-md-2"><input type="button" id="add-quiz"  class="btn btn-info" value="Add Quizs"></div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-2"><label for="quiz" class=" form-control-label">
                                Quiz</label></div>
                        <div class="col-2 col-md-2"><input type="text" id="quiz" name="quiz" placeholder="" disabled=""
                                class="form-control"></div>
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
        <!-- </div> -->
    </div>
</div>
<?php
require_once ("../../../layout/admin/footer.php");
?>

</body>

</html>