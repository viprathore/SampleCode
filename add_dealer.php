<?php
include "session.php";
/* @var $obj db */
ob_start();
$result4 = $obj->selectextrawhere('codegenerator', "`category` like 'uniqueid'");
$num4 = $obj->total_rows($result4);
$codegeneratorid = 0;
$codenumber = 0;
if ($num4) {
    $row4 = $obj->fetch_assoc($result4);
    $codegeneratorid = $row4['id'];
    $codenumber = $row4['number'] + 1;
    $generatedcode = sprintf('%04d', $codenumber);
    // $month = strtoupper(date("M", strtotime($date)));
    $uniqueid = str_replace(array("{prefix}", "{number}"), array($row4['prefix'], $generatedcode), $row4['pattern']);
} else {
    $cg['prefix'] = "EUSER";
    $cg['number'] = 0;
    $cg['pattern'] = "{prefix}{number}";
    $cg['category'] = "uniqueid";
    // $fsed = getfirstandlastday($date);
    $cg['addedon'] = date("Y-m-d H:i:s");
    $cg['addedby'] = $employeeid;
    $cg['status'] = 1;
    $codegeneratorid = $obj->insertnew("codegenerator", $cg);
    $codenumber = 1;
    $generatedcode = sprintf('%04d', $codenumber);
    $uniqueid = str_replace(array("{prefix}", "{number}"), array($cg['prefix'], $generatedcode), $cg['pattern']);
}
?>
<div class="row">
    <div class="col-12">
        <div class="card card-default">
            <div class="card-header">
                <h3 class="card-title">Add User</h3>
                <div class="card-tools">
                    <a href="view_dealers.php" class="btn btn-default" data-card-widget="">
                        << Back </a>
                            <button type="button" class="btn btn-tool" data-card-widget="">
                                <i class="fas fa-times"></i>
                            </button>
                </div>
            </div>
            <!-- /.card-header -->
            <form id="adduser" onsubmit="event.preventDefault();sendForm('', '', 'insert_dealer.php', 'resultid', 'adduser');return 0;">
                <div class="card-body">
                    <div class="form-group">
                        <label>Unique Id</label>
                        <input type="text" readonly class="form-control" data-bvalidator="required" id="did" placeholder="" value="<?= $uniqueid ?>" name="did">
                    </div>
                    <div class="form-group">
                        <label>FirstName</label>
                        <input type="text" class="form-control" data-bvalidator="required,alpha" id="fname" placeholder="" name="firstname">
                    </div>
                    <!-- <div class="form-group">
                        <label>LastName</label>
                        <input type="text" class="form-control" data-bvalidator="required,alpha" id="lname" placeholder="" name="lastname">
                    </div> -->
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" class="form-control" data-bvalidator="required" id="uname" placeholder="" name="username">
                    </div>
                    <div class="form-group">
                        <label>Mobile</label>
                        <input type="tel" class="form-control" maxlength="10" data-bvalidator="minlength[10],required,digit" id="mobile" placeholder="" name="mobile">
                    </div>
                    <div class="form-group">
                        <label>Alternate Number</label>
                        <input type="text" class="form-control" maxlength="" data-bvalidator="" id="phone" placeholder="" name="phone">
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <input type="text" class="form-control" data-bvalidator="required" id="address" placeholder="" name="address">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" data-bvalidator="required,email" id="email" placeholder="" name="email">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" name='password' data-bvalidator="required" id="password" placeholder="">
                    </div>
                    <div class="form-group">
                        <label>Role</label>
                        <select type="text" class="form-control" data-bvalidator="required" id="role" class="form-control select2" name="role">
                            <option value="">Select One</option>
                            <?php
                            $roles = $obj->selectextrawhereupdate("roles", "id,name", "status = 1 ");
                            $rolesname = mysqli_fetch_all($roles);
                            foreach ($rolesname as list($id, $name)) { ?>
                                <option value="<?php echo $id; ?>"> <?php echo $name ?> </option>
                            <?php  } ?>
                        </select>
                    </div>
                    <!-- <div class="form-group">
                        <label>Type</label>
                        <select type="text" class="form-control" data-bvalidator="required" id="type" class="form-control select2" name="type"  >
                           <option value="">Select One</option>
                            <?php
                            $roles = $obj->selectextrawhereupdate("usertypes", "id,name", "status = 1");
                            $rolesname = mysqli_fetch_all($roles);
                            foreach ($rolesname as list($id, $name)) { ?>
                             <option value="<?php echo $id; ?>"> <?php echo $name ?> </option>
                             <?php  } ?>
                            </select>
                    </div> -->
                    <div class="form-group">
                        <label>Profile Image</label>
                        <input type="file" class="form-control" data-bvalidator="" id="path" placeholder="" name="path">
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
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
$pagetitle = "Add User::.Manage User Data";
$pageheader = "Manage Users";
$breadcrumb = '<ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>';
include "./templete.php";
?>