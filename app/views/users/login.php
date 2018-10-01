<?php require APPROOT . "/views/inc/header.php"; ?>
<h1>Login</h1>
<h3>This is the place to login</h3>
<form action="<?php echo URL;?>/users/login" method="post">
	<label for="email">Email: *</label>
	<input type="text" name="email">
	<label for="hash">Password: *</label>
	<input type="password" name="hash">
	<input type="submit" value="Login">
<?php require APPROOT . "/views/inc/footer.php"; ?>