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
                    <a href="view_battery.php" class="btn btn-default" data-card-widget="">
                        << Back </a>
                            <button type="button" class="btn btn-tool" data-card-widget="">
                                <i class="fas fa-times"></i>
                            </button>
                </div>
            </div>
            <!-- /.card-header -->
            <form id="addbattery" onsubmit="event.preventDefault();sendForm('', '', 'insert_battery.php', 'resultid', 'addbattery');return 0;">
                <div class="card-body">
                    <div class="form-group">
                        <label>Serial NO.</label>
                        <input type="text" class="form-control" data-bvalidator="required" id="serialno" placeholder="" name="serialno">
                    </div>
                    <div class="form-group">
                        <label>Make</label>
                        <input type="text" class="form-control" data-bvalidator="required" id="make" placeholder="" name="make">
                    </div>
                    <div class="form-group">
                        <label>Model</label>
                        <input type="text" class="form-control" data-bvalidator="required" id="model" placeholder="" name="model">
                    </div>
                    <div class="form-group">
                        <label>Purchase Date</label>
                        <input type="text" class="form-control" name="purchasedate" id="purchasedate" onfocus="setcalender(this.id)" onchange="warrantydate1()" />
                    </div>
                    <div class="form-group">
                        <label>Warranty End Date</label>
                        <input type="text" class="form-control" name="warrantydate" id="warrantydate" onfocus="setcalenderfuturedate(this.id)" />
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <div id="resultid" class="form-result"></div>
                </div>
            </form>
        </div>
        <!-- /.card -->
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
$pagetitle = "Add Battery::.Manage Battery Data";
$pageheader = "Manage Battery";
$breadcrumb = '<ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>';
include "./templete.php";
?>
<script>
    function addMonths(date, months) {
        var d = date.getDate();
        date.setMonth(date.getMonth() + +months);
        if (date.getDate() != d) {
            date.setDate(0);
        }
        return date;
    }

    function warrantydate1() {
        var purchase = $('#purchasedate').val();
        var newDate = moment(purchase, "DD/MM/YYYY").add(36, 'months').format('DD/MM/YYYY');
        $("#warrantydate").val(newDate);
    }
</script>