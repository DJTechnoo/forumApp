<?php require APPROOT . "/views/inc/header.php"; ?>
<h1>Profile</h1>

<ul class="grey">
	<li><font>Username: </font><font class="margin"><?php echo $data["username"]->username; ?></font></li><br/><br/>
	<li><font>Firstname: </font><font class="margin"><?php echo $data["firstname"]->firstname; ?></font></li><br/><br/>
	<li><font>Lastname: </font><font class="margin"><?php echo $data["lastname"]->lastname; ?></font></li><br/><br/>
	<li><font>Privileges: </font><font class="lessMargin"><?php echo $data["userpriviliege"]->userpriviliege; ?></font></li><br/><br/>
	<li><font>Email: 	</font><font class="moreMargin"><?php echo $data["email"]->email; ?></li></font><br/><br/>
</ul>

<form class="login" action="<?php echo URL; ?>/Users/updatePassword" method="post">
	<input type="password" name="pwd" placeholder="Change Password here"/>
	<input type="submit" value="Change">
<?php require APPROOT . "/views/inc/footer.php"; ?>

<style>
	.login {
		height: 170px;
	}
	
	font{
		color: white;
		font-size: 20px;
	}
	
	.margin {
		margin-left: 1em;
	}
	
	.grey {
		background-color: grey;
		float: center;
	}
	
	.moreMargin {
		margin-left: 2.5em;
	}
	
	.lessMargin {
		margin-left: 0.9em;
	}
	
	li {
		float: center;
	}
</style>