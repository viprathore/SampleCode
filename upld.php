<?php
$target="upload_doc/";
//print_r($_FILES);
//print_r($_POST);
$divname=$_POST['divname'];
$col_name=$_POST['columnname'];
if(is_uploaded_file($_FILES['filename']['tmp_name'])) {
$sourcePath = $_FILES['filename']['tmp_name'];
$fname=$_FILES['filename']['name'];
$fn = pathinfo($fname, PATHINFO_EXTENSION);
$new_base1 =  pathinfo($fname, PATHINFO_FILENAME);
$new_base = $new_base1.date("ymdis");
$file_name = $new_base.".".$fn;

$targetPath = $target.$file_name;
if(move_uploaded_file($sourcePath,$targetPath)) {
?>
<!--<img src="../images/check_list.png" class="upload-preview" width="16" height="16" />
-->
<div class="newshipicon" style="width:45%"><i class="fa fa-check-circle" aria-hidden="true"></i>
</div>
<img src="images/cancel-tag.png" class="upload-preview" width="16" height="16" onclick="delete_doc('<?php echo $targetPath;?>','<?php echo $divname; ?>','<?php echo $col_name; ?>')" />
<input name="uploadfile_<?php echo $col_name; ?>" id="uploadfile_<?php echo $col_name; ?>" value="<?php echo $file_name;?>" type="hidden" />
<!--<i class='fa fa-check-circle' aria-hidden='true'></i>
--><?php
}
}

?>
