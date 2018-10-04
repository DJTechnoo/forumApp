<style>
	body {
		background-color: grey;
	}
	
	
	ul {
		list-style-type: none;
		margin: 0;
		padding: 0;
		overflow: hidden;
		background-color: #333;
	}

	li {
		float:  left;
		display:inline;
	}

	li a {
		display: block;
		color: white;
		text-align: center;
		padding: 14px 16px;
		text-decoration: none;
	}

	li a:hover {
		background-color: #111;
	}

	table {
		background-color: #333;
	}

	th {
		color: white;
		font-weight: normal;
	}

	h1 {
		color: white;
	}
</style>

<ul>
	<li>
		<a href="<?php echo URL; ?>">Home</a>	
	</li>

	<li>
		<a href="<?php echo URL; ?>/pages/about">About</a>	
	</li>
	<li>
		<a href="<?php echo URL; ?>/threads/index">Threads</a>
	</li>
<?php if(isset($_SESSION['user_id'])): ?>
	
	<li>
		<a href="<?php echo URL; ?>/users/logout">Logout</a>
	</li>

<?php else : ?>
	<li>
		<a href="<?php echo URL; ?>/users/register">Register</a>
	</li>
	<li>
		<a href="<?php echo URL; ?>/users/login">Login</a>
	</li>
<?php endif; ?>
</ul>