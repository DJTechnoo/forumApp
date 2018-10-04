<?php require APPROOT . "/views/inc/header.php"; ?>
<h1>Add Thread</h1>
<div class=login>
<form action="<?php echo URL;?>/threads/addthread" method="post">
	<input type="text" name="threadname" placeholder="Thread name">
	<input type="submit" value="Add">
</div>
<?php require APPROOT . "/views/inc/footer.php"; ?>

<style>
	.login {
		height: 170px;
	}
</style>