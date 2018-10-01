<?php require APPROOT . "/views/inc/header.php"; ?>
<h1><?php echo $data["title"];?></h1>
<?php foreach($data["threads"] as $thread) echo "$thread->threadname <br> "  ?>
<?php require APPROOT . "/views/inc/footer.php"; ?>