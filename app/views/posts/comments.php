<?php require APPROOT . "/views/inc/header.php"; ?>
<h1><?php echo $data["title"];?></h1>

<h1>Post text:</h1>
<h2><?php echo $data["text"];?><h2>

<li><h2><a href="<?php echo URL; ?>/posts/addcomment/<?php echo $data['currentPost'];?>" >Add Comment</a></h2></li><br/><br/><br/><br/><br/><br/>

<table>
<tr>
	<th class="size" scope="col"><font size="+3">Comment</font></th>
	<th scope="col"><font size="+3">Posted by</font></th>
	<th scope="col"><font size="+3">Date</font></th>
</tr>
  

<?php foreach($data["comments"] as $comment) :?>
<tr>
		  <td><?php echo "<font size='+2'> $comment->text </font>" ?></td>
		  <td><?php echo "<font size='+2'> $comment->username </font>" ?></td>
		  <td><?php echo "<font size='-1'> $comment->date </font>" ?> </td>
		  <?php if(/*$_SESSION["user_id"] === $this->postModel->getCommentUserid($data['comments'])*/isset($_SESSION["user_id"]) && $_SESSION["user_priviliege"] === 'admin' || $_SESSION["user_priviliege"] === 'moderator'){ ?>
				<td><a href="<?php echo URL; ?>/Posts/deleteComment/<?php echo $comment->commentid; ?>">Delete</a></td>
		<?php } ?>
</tr>
<?php endforeach;?>
</table> 
<?php require APPROOT . "/views/inc/footer.php"; ?>
<style>
	.size {
		width: 80%;
	}
	h2 {
		color: white;
	}
</style>