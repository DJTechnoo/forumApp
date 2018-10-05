<?php require APPROOT . "/views/inc/header.php"; ?>
<h1>Add Post</h1>
<form class="login" action="<?php echo URL;?>/posts/addpost/<?php echo $data["currentThread"];?>" method="post">
	<input type="text" name="posttitle" placeholder="Post title">
	<br/><br/>
	<textarea class="margin" cols="31" rows="7" maxlength="255" name="posttext" placeholder="Post text"></textarea>
	<input type="submit" value="Add">
<?php require APPROOT . "/views/inc/footer.php"; ?>

<style>
	.login {
		width: 300px;
		height: 380px;
	}
	textarea {
		margin-left: 2em;
		height: 160px;
	}
</style>