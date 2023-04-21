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
                    <a href="view_device_allotment.php" class="btn btn-default" data-card-widget="">
                        << Back </a>
                            <button type="button" class="btn btn-tool" data-card-widget="">
                                <i class="fas fa-times"></i>
                            </button>
                </div>
            </div>
            <!-- /.card-header -->
            <form id="adddevice" onsubmit="event.preventDefault();sendForm('', '', 'insert_device_allotment.php', 'resultid', 'adddevice');return 0;">
                <div class="card-body">
                    <div class="form-group">
                        <label>Vehicle</label>
                        <select type="text" class="form-control" data-bvalidator="required" id="vehicleid" class="form-control select2" name="vehicleid">
                            <option value="">Select One</option>
                            <?php
                            $driver = $obj->selectextrawhereupdate("vehicles inner join batteryallotment on batteryallotment.vehicleid = vehicles.id", "vehicles.id ,vehicles.chasis", " vehicles.status = 1 and batteryallotment.status = 1  and vehicles.id not in (select vehicleid from deviceallotment where deviceallotment.status=1) ");
                            $drivername = mysqli_fetch_all($driver);
                            foreach ($drivername as list($id, $chasis, $vin)) { ?>
                                <option value="<?php echo $id; ?>"> <?php echo $chasis ?> </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Device</label>
                        <select type="text" class="form-control" data-bvalidator="required" id="deviceid" class="form-control select2" name="deviceid">
                            <option value="">Select One</option>
                            <?php
                            $driver = $obj->selectextrawhereupdate("devices", "id,deviceid", "devices.status = 1  and id not in (select deviceid from deviceallotment where status=1) ");
                            $drivername = mysqli_fetch_all($driver);
                            foreach ($drivername as list($id, $deviceid)) { ?>
                                <option value="<?php echo $id; ?>"> <?php echo $deviceid  ?> </option>
                            <?php } ?>
                        </select>
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
$pagetitle = "Add Device Allotment::.Manage Device Allotment";
$pageheader = "Manage Device Allotment";
$breadcrumb = '<ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>';
include "./templete.php";
?>