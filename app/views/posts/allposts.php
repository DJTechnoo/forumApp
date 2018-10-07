<?php require APPROOT . "/views/inc/header.php";
require APPROOT . "/controllers/Threads.php";
?>
<h1><?php echo $data["title"];?></h1>

<h2>
	<li><a href="<?php echo URL; ?>/posts/addpost/<?php echo $data["currentThread"]; ?>"><p>New Post</p></a></li><br/><br/><br/><br/>
</h2>
<table>
<tr>
	<th class="size" scope="col"><font size="+3">Title</font></th>
	<th scope="col"><font size="+3">Created by</font></th>
	<th scope="col"><font size="+3">Date</font></th>
</tr>

<?php foreach($data["posts"] as $post) :?>
<tr>
	<td><a href="<?php echo URL;?>/posts/seepost/<?php echo $post->postid;?>"><?php echo "<font size='+2'> $post->title </font>" ?></a> </td>
	<td><?php echo "<font size='+2'> $post->username </font>" ?></td>
	<td><?php echo "<font size='-1'> $post->date </font>" ?> </td>
    <?php if(/*$_SESSION["user_id"] === $this->postModel->getCommentUserid() &&*/ $_SESSION["user_priviliege"] === 'admin' || $_SESSION["user_priviliege"] === 'moderator'){ ?>
		<td><a href="<?php echo URL; ?>/post/deletePosts/<?php echo $thread->threadid;?>">Delete</a></td>
	<?php } ?>
</tr>
<?php endforeach; ?>
</table>
<?php require APPROOT . "/views/inc/footer.php"; ?>
<style>
	.size {
		width: 80%;
	}
</style>