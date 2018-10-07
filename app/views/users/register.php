<?php require APPROOT . "/views/inc/header.php"; ?>

<h1>Register</h1>
<h3>Please fill out the form below to register with us</h3>
<form class="login" action="<?php echo URL;?>/users/register" method="post">
	<input type="text" name="firstname" placeholder="Firstname *">
	<input type="text" name="lastname" placeholder="Lastname *">
	<input type="text" name="email" placeholder="Email *">
	<input type="text" name="username" placeholder="Username *">
	<input type="password" name="hash" placeholder="Password *">
	<input type="submit" value="Register">

<?php require APPROOT . "/views/inc/footer.php"; ?>

<style>
	.login {
		height: 450px;
	}
	h3 {
		color: white;
	}
</style>