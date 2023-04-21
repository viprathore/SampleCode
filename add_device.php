<?php
include "session.php";
/* @var $obj db */
ob_start();
?>
<div class="row">
    <div class="col-12">
        <div class="card card-default">
            <div class="card-header">
                <h3 class="card-title">Add Device</h3>
                <div class="card-tools">
                    <a href="view_devices.php" class="btn btn-default" data-card-widget="">
                        << Back </a>
                            <button type="button" class="btn btn-tool" data-card-widget="">
                                <i class="fas fa-times"></i>
                            </button>
                </div>
            </div>
            <form id="adddevice" onsubmit="event.preventDefault();sendForm('', '', 'insert_device.php', 'resultid', 'adddevice');return 0;">
                <div class="card-body">
                    <div class="form-group">
                        <label>Device Id</label>
                        <input type="tel" class="form-control" data-bvalidator="required" id="deviceid" placeholder="" name="deviceid">
                    </div>
                    <div class="form-group">
                        <label>Make</label>
                        <input type="text" class="form-control" name='make' data-bvalidator="required" id="make" placeholder="">
                    </div>
                    <div class="form-group">
                        <label>Model</label>
                        <input type="text" class="form-control" name='model' data-bvalidator="required" id="model" placeholder="">
                    </div>
                    <div class="form-group">
                        <label>Simid</label>
                        <input type="text" class="form-control" data-bvalidator="required" id="simid" placeholder="" name="simid">
                    </div>
                    <div class="form-group">
                        <label>Alias</label>
                        <input type="text" class="form-control" name='alias' data-bvalidator="required" id="alias" placeholder="">
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
$pagetitle = "Add Device::.Manage Device Data";
$pageheader = "Manage Devices";
$breadcrumb = '<ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>';
include "./templete.php";
?>