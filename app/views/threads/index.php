<?php require APPROOT . "/views/inc/header.php"; ?>
<h1><?php echo $data["title"];?></h1>
<li><h2><a href="<?php echo URL; ?>/threads/addthread">Add new thread</a></h2></li><br/><br/><br/><br/><br/><br/>
<?php foreach($data["threads"] as $thread) :?>

<table>
<tr>
	<th scope='col'><h3>Threads</h3></th><th class='th' scope='col'>Posts</th>
</tr>
    <td><a href="<?php echo URL; ?>/posts/listposts/<?php echo $thread->threadid;?>"><?php echo "$thread->threadname" ?></a></td>
	<td><p class='center'><?php echo $thread->postcount ?></p></td>    
</table>

<?php endforeach; ?>
<?php require APPROOT . "/views/inc/footer.php"; ?>
<style>
	.center {
		float: center;
	}
	p {
		color: white;
		text-align: center;
	}
	a {
		color: white;
		text-decoration: none;
	}
</style>