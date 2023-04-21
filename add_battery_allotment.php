<?php
include "session.php";
/* @var $obj db */
ob_start();
?>
<div class="row">
    <div class="col-12">
        <div class="card card-default">
            <div class="card-header">
                <h3 class="card-title">Add Battery</h3>
                <div class="card-tools">
                    <a href="view_battery_allotment.php" class="btn btn-default" data-card-widget="">
                        << Back </a>
                            <button type="button" class="btn btn-tool" data-card-widget="">
                                <i class="fas fa-times"></i>
                            </button>
                </div>
            </div>
            <form id="addbattery" onsubmit="event.preventDefault();sendForm('', '', 'insert_battery_allotment.php', 'resultid', 'addbattery');return 0;">
                <div class="card-body">
                    <div class="form-group">
                        <label>Vehicle</label>
                        <select type="text" class="form-control" data-bvalidator="required" id="vehicleid" class="form-control select2" name="vehicleid">
                            <option value="">Select One</option>
                            <?php
                            $driver = $obj->selectextrawhereupdate("vehicles", "vehicles.id ,vehicles.chasis ", " vehicles.status = 1  and id not in (select vehicleid from batteryallotment where status=1) ");
                            $drivername = mysqli_fetch_all($driver);
                            foreach ($drivername as list($id, $chasis, $vin)) { ?>
                                <option value="<?php echo $id; ?>"> <?php echo $chasis ?> </option>
                            <?php  } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Battery</label>
                        <select type="text" class="form-control" data-bvalidator="required" id="deviceid" class="form-control select2" name="batteryid">
                            <option value="">Select One</option>
                            <?php
                            $driver = $obj->selectextrawhereupdate("battery", "id,serialno", "status = 1  and id not in (select batteryid from batteryallotment where status=1) ");
                            $drivername = mysqli_fetch_all($driver);
                            foreach ($drivername as list($id, $serialno)) { ?>
                                <option value="<?php echo $id; ?>"> <?php echo $serialno ?> </option>
                            <?php  } ?>
                        </select>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
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
$pagetitle = "Add Battery Allotment::.Manage Battery Allotment";
$pageheader = "Manage Battery Allotment";
$breadcrumb = '<ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>';
include "./templete.php";
?>