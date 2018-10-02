<?php require APPROOT . "/views/inc/header.php"; ?>
<h1><?php echo $data["title"];?></h1>



<?php foreach($data["posts"] as $post) :?>
<li>
	<?php echo "$post->title <br>"; 
		  echo "Written by $post->username <br><br>";?>
</li>
<?php endforeach; ?>
<?php require APPROOT . "/views/inc/footer.php"; ?>