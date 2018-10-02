<?php require APPROOT . "/views/inc/header.php"; ?>
<h1><?php echo $data["title"];?></h1>
<h2><a href="<?php echo URL; ?>/threads/addthread">Add new thread</a></h2>
<?php foreach($data["threads"] as $thread) :?>
<li>
	<a href="<?php echo URL; ?>/threads/listposts/<?php echo $thread->threadid;?>"><?php echo "$thread->threadname <br>"; ?></a>	
</li>
<?php endforeach; ?>
<?php require APPROOT . "/views/inc/footer.php"; ?>