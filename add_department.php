<?php
include "session.php";
/* @var $obj db */
ob_start();
?>
<div class="row">
    <div class="col-12">
        <div class="card card-default">
            <div class="card-header">
                <h3 class="card-title">Add Department</h3>
                <div class="card-tools">
                    <a href="view_department.php" class="btn btn-default" data-card-widget="">
                        << Back </a>
                            <button type="button" class="btn btn-tool" data-card-widget="">
                                <i class="fas fa-times"></i>
                            </button>
                </div>
            </div>
            <!-- /.card-header -->
            <form id="adddepartment" onsubmit="event.preventDefault();sendForm('', '', 'insert_department.php', 'resultid', 'adddepartment');return 0;">
                <div class="card-body">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" data-bvalidator="required" class="form-control" id="name" placeholder="" name="name">
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <input type="text" class="form-control" name='description' id="" placeholder="">
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <div id="resultid" class="form-result"></div>
                </div>
            </form>
        </div>
    </div>
    <!-- /.col -->
</div>
<?php
$pagemaincontent = ob_get_clean();
ob_clean();
$extracss = "";
$extrajs = '
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
';
$pagemeta = "";
$pagetitle = "Add Department::.Manage Departments-Quality";
$pageheader = "Manage Departments";
$breadcrumb = '<ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>';
include "./templete.php";
?>