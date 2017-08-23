<?php
include 'init.php';
function register_user($register_data)
{
	array_walk($register_data, 'array_sanitize');
	$register_data['pwd']=md5($register_data['pwd']);
	$fields='`' . implode('`, `', array_keys($register_data)) . '`';
	$data= '\'' . implode('\', \'', $register_data). '\'';
    $conn = new mysqli('your_host', 'username', 'password', 'databasename');
	$sql ="INSERT INTO `user` ($fields) VALUES ($data)";
	 if($conn->query($sql)=== TRUE)
		{ 
                   
                      return true;
                }
	 else 
		 return false;
}
function logged_in(){
	return (isset($_SESSION['user_id'])) ? true :false;
}
function user_exists($username){
	$conn = new mysqli('your_host', 'username', 'password', 'databasename');
	$sql = " SELECT `user_id` FROM `user` WHERE `username` ='$username' ";
	$result = $conn->query($sql);
	if($result->num_rows == 1 )
        return true;
    else
       return false;
 }
 function get_user_id($username)
 {
	$conn = new mysqli('your_host', 'username', 'password', 'databasename');
    $sql = " SELECT `user_id` FROM `user` WHERE `username` ='$username' ";
	$result = $conn->query($sql);
    $row=$result->fetch_assoc();
	return $row["user_id"];
  
 }
 function login($username, $password)
 {
	$conn = new mysqli('your_host', 'username', 'password', 'databasename');
	$id=get_user_id($username);
	$password =md5($password);
	$sql= " SELECT * FROM `tablename` WHERE `username`='$username' AND `pwd` = '$password' ";
	$result = $conn->query($sql);
    if($result->num_rows == 1)
		return $id;
	else 
      return false;
 }
 function array_sanitize(&$item)
 {
	$conn = new mysqli('your_host', 'username', 'password', 'databasename');
    $item =mysqli_real_escape_string($conn, $item);
 }
?>
