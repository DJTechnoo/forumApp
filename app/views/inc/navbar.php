<li>
	<a href="<?php echo URL; ?>">Home</a>	
</li>

<li>
	<a href="<?php echo URL; ?>/pages/about">About</a>	
</li>
<?php if(isset($_SESSION['user_id'])): ?>

	<li>
		<a href="<?php echo URL; ?>/users/logout">Logout</a>
	</li>

	<li>
		<a href="<?php echo URL; ?>/posts/index">Posts</a>
	</li>


<?php else : ?>
	<li>
		<a href="<?php echo URL; ?>/users/register">Register</a>
	</li>
	<li>
		<a href="<?php echo URL; ?>/users/login">Login</a>
	</li>
<?php endif; ?>
