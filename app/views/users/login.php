<?php require APPROOT . "/views/inc/header.php"; ?>
<h1>Login</h1>
<h3>This is the place to login</h3>
<form action="<?php echo URL;?>/users/login" method="post">
	<label for="name">Name: *</label>
	<input type="text" name="name">
	<label for="password">Password: *</label>
	<input type="password" name="password">
	<input type="submit" value="Login">
<?php require APPROOT . "/views/inc/footer.php"; ?>