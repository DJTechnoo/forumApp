<?php require APPROOT . "/views/inc/header.php"; ?>
<h1>Register</h1>
<h3>Please fill out the form below to register with us</h3>
<form action="<?php echo URL;?>/users/register" method="post">
	<label for="email">Email: *</label>
	<input type="text" name="email">
	<label for="username">Username: *</label>
	<input type="text" name="username">
	<label for="hash">Password: *</label>
	<input type="password" name="hash">
	<input type="submit" value="Register">
<?php require APPROOT . "/views/inc/footer.php"; ?>