<?php
function redirect($page){
	header("location: " . URL . "/" . $page);

}
function salt(){
	$salt = random_bytes(15); //Generating 15 random bytes
	$salt = base64_encode($salt); //Converting the random bytes to base64 
	$salt = str_replace('+', '.', $salt); //Replacing all '+' with '.'
	return($salt);
}
?>