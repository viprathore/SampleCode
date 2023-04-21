<?php
include "session.php";
/* @var $obj db */
ob_start();
?>
<div class="row">
    <div class="col-12">
        <div class="card card-default">
            <div class="card-header">
                <h3 class="card-title">Add Checklist</h3>
                <div class="card-tools">
                    <a href="view_checklist.php" class="btn btn-default" data-card-widget="">
                        << Back </a>
                            <button type="button" class="btn btn-tool" data-card-widget="">
                                <i class="fas fa-times"></i>
                            </button>
                </div>
            </div>
            <form id="adddevice" onsubmit="event.preventDefault();sendForm('', '', 'insert_checklist.php', 'resultid', 'adddevice');return 0;">
                <div class="card-body">
                    <div class="form-group">
                        <label>Title</label>
                        <input type="tel" class="form-control" data-bvalidator="required" id="title" placeholder="" name="title">
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea type="text" class="form-control" name="description" data-bvalidator="required" id="description" placeholder=""></textarea>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <div id="resultid" class="form-result"></div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php
$pagemaincontent = ob_get_clean();
ob_clean();
$extracss = "";
$extrajs = '
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
';
$pagemeta = "";
$pagetitle = "Add Checklist::.Manage Checklist Data";
$pageheader = "Manage Checklist";
$breadcrumb = '<ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>';
include "./templete.php";
?>