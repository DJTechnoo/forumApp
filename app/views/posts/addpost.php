<?php require APPROOT . "/views/inc/header.php"; ?>
<h1>Add Post</h1>
<form action="<?php echo URL;?>/posts/addpost/<?php echo $data["currentThread"];?>" method="post">
	<label for="title">Post Title:</label>
	<input type="text" name="posttitle">
	<br>
	<textarea cols="40" rows="5" name="posttext"></textarea>
	<input type="submit" value="Add">
<?php require APPROOT . "/views/inc/footer.php"; ?>