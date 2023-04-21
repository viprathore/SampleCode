<?php
include "session.php";
/* @var $obj db */
ob_start();
$id = $_GET['hakuna'];
$fields = "allotments.id as id,concat(users.firstname,' ',users.lastname) as customer,users.id as userid, allotments.startdate as startdate, allotments.enddate as enddate, allotments.status as status";
$join = " inner join users on allotments.userid=users.id";
$result = $obj->selectextrawhereupdate("allotments $join", "$fields", "allotments.id = $id");
$row = $obj->fetch_assoc($result);
?>
<div class="row">
    <div class="col-12">
        <div class="card card-default">
            <div class="card-header">
                <h3 class="card-title">Add Payment</h3>
                <div class="card-tools">
                    <a href="allotments.php" class="btn btn-default" data-card-widget="">
                        << Back </a>
                            <button type="button" class="btn btn-tool" data-card-widget="">
                                <i class="fas fa-times"></i>
                            </button>
                </div>
            </div>
            <form id="addpayment" onsubmit="event.preventDefault();sendForm('id', '<?php echo $id ?>', 'insert_deposit.php', 'resultid', 'addpayment');return 0;">
                <div class="card-body">
                    <input value=<?= $row['userid'] ?> name="userid" hidden />
                    <!-- <input value=<?php //$row['vehicleid'] ?> name="vehicleid" hidden /> -->
                    <!-- <div class="form-group">
                        <label>Mode</label>
                        <select type="text" class="form-control" data-bvalidator="required" id="method" class="form-control select2" name="method">
                            <option value="">Select One</option>
                            <?php
                            // $mode = $obj->selectextrawhereupdate("paymentmode", "id,name", "status=1");
                            // $modename = mysqli_fetch_all($mode);
                            // foreach ($modename as list($id, $name)) { ?>
                                <option value="<?php //echo $id; ?>"> <?php //echo $name ?> </option>
                            <?php //} ?>
                        </select>
                    </div> -->
                    <div class="form-group">
                        <label>Amount Needs To be Deposit</label>
                        <input type="number" class="form-control" data-bvalidator="required,min[<?= $row["tokenamount"] ?>]" id="depositamount" placeholder="" name="depositamount">
                    </div>
                    <!-- <div class="form-group">
                        <label>Payment Date</label>
                        <input type="text" class="form-control" name="depositdate" id="depositdate" onfocus="setcalender(this.id)" />
                    </div> -->
                    <input value="Due Deposit" name="type" hidden />
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
$pagetitle = "Add Payment::.Manage Payment Data";
$pageheader = "Manage Payment";
$breadcrumb = '<ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>';
include "./templete.php";
?>