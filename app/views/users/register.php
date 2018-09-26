<?php require APPROOT . "/views/inc/header.php"; ?>
<h1>Register</h1>
<h3>Please fill out the form below to register with us</h3>
<form action="<?php echo URL;?>/users/register" method="post">
	<label for="name">Name: *</label>
	<input type="text" name="name">
	<label for="birthyear">Birthyear: *</label>
	<input type="text" name="birthyear">
	<label for="password">Password: *</label>
	<input type="password" name="password">
	<input type="submit" value="Register">
<?php require APPROOT . "/views/inc/footer.php"; ?>