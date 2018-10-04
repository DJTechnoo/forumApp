<!DOCTYPE html>
 <head>
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <title>Captcha code</title>
 <style>
 *{padding:0px; margin:0px;}
 .captcha{font-family: Arial, Helvetica, sans-serif;  background:url(capimage.jpg) no-repeat; width:300px; height:150px; line-height:60px; text-align:center;}
 p{font-size:40px; color:rgba(36,32,31,.7); position:absolute; top:50px; left:80px;}
 </style>
 </head>

<body>

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

</body>
 </html>