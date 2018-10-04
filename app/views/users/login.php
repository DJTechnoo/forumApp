<?php require APPROOT . "/views/inc/header.php"; ?>
<div class="login">
<form action="<?php echo URL;?>/users/login" method="post">
	<input type="text" placeholder="Email" name="email">  
	<input type="password" placeholder="password" name="hash">
	<input type="submit" value="Login"> 
</div>
<div class="shadow"></div>
<?php require APPROOT . "/views/inc/footer.php"; ?>