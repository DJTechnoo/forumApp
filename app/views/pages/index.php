<?php require APPROOT . "/views/inc/header.php"; ?>
<h1><?php echo $data["title"];?></h1>
<?php 
	foreach($data["posts"] as $post){
		echo "name: $post->name<br>";
	}	
?>
<?php require APPROOT . "/views/inc/footer.php"; ?>