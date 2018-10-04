 <?php require APPROOT . "/views/inc/header.php"; ?>
 <div class="captcha">
 <p>
 <?php
 $salt = random_bytes(5); //Generating 15 random bytes
 $salt = base64_encode($salt); //Converting the random bytes to base64 
 $salt = str_replace('+', '.', $salt); //Replacing all '+' with '.'
 echo substr($salt,0,5);
 ?>
 </p>
 </div>
<?php require APPROOT . "/views/inc/footer.php"; ?>

<style>
	*{padding:0px; margin:0px;}
	.captcha{
		font-family: Arial, Helvetica, sans-serif;
		background-image: url("https://d2v9y0dukr6mq2.cloudfront.net/video/thumbnail/N13e7awhgiljgescq/videoblocks-blue-abstract-background-texture-moving-digital-backdrop_bfwilfalz_thumbnail-full01.png");
		width:300px;
		height:150px;
		line-height:60px;
		text-align:center;
	}
	p {
		font-size:40px; 
		color:rgba(36,32,31,.7); 
		position:absolute; 
		top:50px; 
		left:80px;
	}
</style>