<?php 
require APPROOT . "/views/inc/header.php";
?>
<h1><?php echo $data["title"];?></h1>

<?php if(isset($_SESSION["user_id"]) && $_SESSION["user_priviliege"] === 'admin' || $_SESSION["user_priviliege"] === 'moderator') {?>
<li><h2><a href="<?php echo URL; ?>/threads/addthread">Add new thread</a></h2></li><br/><br/><br/><br/><br/><br/>
<?php } ?>

<table>
<tr>
	<th scope='col'><font size='+4'>Threads</font></th><th class='th' scope='col'><font size='+4'>Posts</font></th>
	
</tr>
<?php foreach($data["threads"] as $thread) :?>
	<tr>
		<td><a href="<?php echo URL; ?>/posts/listposts/<?php echo $thread->threadid;?>"><?php echo "<font size='+3'>$thread->threadname</font>" ?></a></td>	
		<td><p class='center'><?php echo $thread->postcount ?></p></td>
		<?php if(isset($_SESSION["user_id"]) && $_SESSION["user_priviliege"] === 'admin' || $_SESSION["user_priviliege"] === 'moderator'){ ?>
		<td><a href="<?php echo URL; ?>/Threads/deleteThread/<?php echo $thread->threadid;?>">Delete</a></td>
		<?php } ?>
	</tr>
<?php endforeach; ?>
</table>
<?php require APPROOT . "/views/inc/footer.php"; ?>
<style>
	.center {
		float: center;
	}
	
	p {
		color: white;
		text-align: center;
	}
	
	.login {
		height: 170px;
	}
</style>