<?php
function sanitize($username)
{
	$conn = new mysqli('localhost', 'root', '', 'user_list');
return mysqli_real_escape_string($conn, $username);
}

?>
