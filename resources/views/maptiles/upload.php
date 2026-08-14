<?php
if(!empty($_FILES)) {
if(is_uploaded_file($_FILES['userImage']['tmp_name'])) {
$sourcePath = $_FILES['userImage']['tmp_name'];
$targetPath = "dist/".$_FILES['userImage']['name'];
if(move_uploaded_file($sourcePath,$targetPath)) {
?>
<div class="col-lg-12 text-center">
	<img class="img-responsive" src="<?php echo $targetPath; ?>" style="margin: 0 auto;"/>
</div>
<?php
}
}
}
?>