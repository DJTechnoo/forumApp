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
	h1 {
		color: white;
	}
	p {
		color: white;
	}
	table, tr, th, td {
		border: 1px solid grey;
	}
	th, td {
		padding: 5px;
	}
	th {
		color: white;
		width: 100%;
	}
	table {
		background-color: #333;
	}
	th {
		text-align: left;
	}
	tr {
		border-color: grey;
	}
	tr:hover {
		background-color: #111;
	}
	td {
		color: white;
	}
	a {
		color: white;
		text-decoration: none;
	}
	.login {
		background: #333;
		border: 1px solid #42464b;
		border-radius: 6px;
		height: 250px;
		margin: 20px auto 0;
		width: 298px;
	}
	.login h1 {
		background-image: linear-gradient(top, #f1f3f3, #d4dae0);
		border-bottom: 1px solid grey;
		border-radius: 6px 6px 0 0;
		box-sizing: border-box;
		color: grey;
		display: block;
		height: 43px;
		font: 600 14px/1 'Open Sans', sans-serif;
		padding-top: 14px;
		margin: 0;
		text-align: center;
		text-shadow: 0 -1px 0 rgba(0,0,0,0), 0 1px 0 #fff;
	}

	input[type="password"], input[type="text"], textarea {
		background: url('http://i.minus.com/ibhqW9Buanohx2.png') center left no-repeat, linear-gradient(top, #d6d7d7, #dee0e0);
		border-radius: 4px;
		box-shadow: 0 1px black;
		box-sizing: border-box;
		color: black;
		height: 39px;
		margin: 31px 0 0 29px;
		padding-left: 37px;
		transition: box-shadow 0.3s;
		width: 240px;
	}
	input[type="password"]:focus, input[type="text"]:focus, textarea:focus {
		box-shadow: 0 0 4px 1px;
		outline: 0;
	}
	.show-password {
		display: block;
		height: 16px;
		margin: 26px 0 0 28px;
		width: 87px;
	}
	input[type="checkbox"] {
		cursor: pointer;
		height: 16px;
		opacity: 0;
		position: relative;
		width: 64px;
	}
	input[type="checkbox"]:checked {
		left: 29px;
		width: 58px;
	}
	.toggle {
		background: url(http://i.minus.com/ibitS19pe8PVX6.png) no-repeat;
		display: block;
		height: 16px;
		margin-top: -20px;
		width: 87px;
		z-index: -1;
	}
	input[type="checkbox"]:checked + .toggle { background-position: 0 -16px }
	.forgot {
		color: grey;
		display: inline-block;
		float: right;
		font: 12px/1 sans-serif;
		left: -19px;
		position: relative;
		text-decoration: none;
		top: 5px;
		transition: color .4s;
	}
	.forgot:hover { color: black }
	input[type="submit"] {
		width:240px;
		height:35px;
		display:block;
		font-family:Arial, "Helvetica", sans-serif;
		font-size:16px;
		font-weight:bold;
		color:black;
		text-decoration:none;
		text-transform:uppercase;
		text-align:center;
		text-shadow:1px 1px 0px grey;
		padding-top:6px;
		margin: 29px 0 0 29px;
		position:relative;
		cursor:pointer;
		border: none;  
		background-color: darkgrey;
		border-top-left-radius: 5px;
		border-top-right-radius: 5px;
		border-bottom-right-radius: 5px;
		border-bottom-left-radius:5px;
		box-shadow: inset 0px 1px 0px grey, 0px 5px 0px 0px grey;
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
		<a href="<?php echo URL; ?>/users/displayProfile">Profile</a>
	</li>
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