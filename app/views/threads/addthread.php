<?php require APPROOT . "/views/inc/header.php"; ?>
<h1>Add Thread</h1>
<form action="<?php echo URL;?>/threads/addthread" method="post">
	<label for="threadname">Thread name:</label>
	<input type="text" name="threadname">
	<input type="submit" value="Add">
<?php require APPROOT . "/views/inc/footer.php"; ?>