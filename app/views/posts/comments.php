<?php require APPROOT . "/views/inc/header.php"; ?>
<h1><?php echo $data["title"];?></h1>

<table>
<tr>
	<th class="size" scope="col"><font size="+3">Comment</font></th>
	<th scope="col"><font size="+3">Posted by</font></th>
	<th scope="col"><font size="+3">Date</font></th>
</tr>


<?php foreach($data["comments"] as $comment) :?>
<tr>
		  <td><?php echo "<font size='+2'> $comment->text </font>" ?></td> <!-- Add comments link on this line -->
		  <td><?php echo "<font size='+2'> $comment->username </font>" ?></td>
		  <td><?php echo "<font size='-1'> $comment->date </font>" ?> </td>
</tr>
<?php endforeach; ?>
</table>
<?php require APPROOT . "/views/inc/footer.php"; ?>
<style>
	.size {
		width: 80%;
	}
</style>