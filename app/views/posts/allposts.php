<?php require APPROOT . "/views/inc/header.php";
require APPROOT . "/controllers/Threads.php";
?>
<h1><?php echo $data["title"];?></h1>

<h2>
	<li><a href="<?php echo URL; ?>/posts/addpost/<?php echo $data["currentThread"]; ?>"><p>New Post</p></a></li><br/><br/><br/><br/>
</h2>
<?php// if(isset($_SESSION["user_id"]) && $_SESSION["user_priviliege"] === 'admin' || $_SESSION["user_priviliege"] === 'moderator') { ?>
	<!--<form action="" method="post">
		<input type="submit" name="delButton" id="delButton" value="Delete post"><br/><br/> -->
<?php //}?>

<?php	//if(isset($_POST['delButton'])) { 
			//$this->deletePost($data["currentThread"]) /*redirect("deletethread/".  $data["currentThread"])*/;
			//$_POST['delButton'] = $post->threadid;
		//}
	//echo $data["currentThread"];
		?>
		
<table>
<tr>
	<th class="size" scope="col"><font size="+3">Title</font></th>
	<th scope="col"><font size="+3">Created by</font></th>
	<th scope="col"><font size="+3">Date</font></th>
</tr>

<?php foreach($data["posts"] as $post) :?>
<tr>
		  <td><?php echo "<font size='+2'> $post->title </font>" ?> </td> <!-- Add comments link on this line -->
		  <td><?php echo "<font size='+2'> $post->username </font>" ?></td>
		  <td><?php echo "<font size='-1'> $post->date </font>" ?> </td>
</tr>
<?php endforeach; ?>
</table>
<?php require APPROOT . "/views/inc/footer.php"; ?>
<style>
	.size {
		width: 80%;
	}
</style>