<?php require APPROOT . "/views/inc/header.php"; ?>
<h1><?php echo $data["title"];?></h1>

<h2>
		<a href="<?php echo URL; ?>/posts/addpost/<?php echo $data["currentThread"]; ?>">New Post</a>
</h2>


<?php foreach($data["posts"] as $post) :?>
<li>
	<?php echo "	<h3>$post->title</h3> <br>"; 
		  echo "	$post->text <br>";
		  echo "Written by $post->username on $post->date <br><br>";?>
</li>
<?php endforeach; ?>
<?php require APPROOT . "/views/inc/footer.php"; ?>