<?php
include 'init.php';
function register_user($register_data)
{
	array_walk($register_data, 'array_sanitize');
        $admin_email="svkrclg@gmail.com";
	$register_data['pwd']=md5($register_data['pwd']);
	$fields='`' . implode('`, `', array_keys($register_data)) . '`';
	$data= '\'' . implode('\', \'', $register_data). '\'';
    $conn = new mysqli('localhost', 'id2427679_svkrclg', 'happyacct', 'id2427679_user_list');
	$sql ="INSERT INTO `user` ($fields) VALUES ($data)";
	 if($conn->query($sql)=== TRUE)
		{ 
                   /*if( mail($register_data['email'],"Verify the email. Click on the URL", "https://happyacct.000webhostapp.com/register/email_activate.php?usrn=".$register_data['username']."&email_code".$register_data['email_code'], "From:" . $admin_email))*/
                      return true;
                }
	 else 
		 return false;
}
function logged_in(){
	return (isset($_SESSION['user_id'])) ? true :false;
}
function user_exists($username){
	$conn = new mysqli('localhost', 'id2427679_svkrclg', 'happyacct', 'id2427679_user_list');
	$sql = " SELECT `user_id` FROM `user` WHERE `username` ='$username' ";
	$result = $conn->query($sql);
	if($result->num_rows == 1 )
        return true;
    else
       return false;
 }
 function get_user_id($username)
 {
	$conn = new mysqli('localhost', 'id2427679_svkrclg', 'happyacct', 'id2427679_user_list');
    $sql = " SELECT `user_id` FROM `user` WHERE `username` ='$username' ";
	$result = $conn->query($sql);
    $row=$result->fetch_assoc();
	return $row["user_id"];
  
 }
 function login($username, $password)
 {
	$conn = new mysqli('localhost', 'id2427679_svkrclg', 'happyacct', 'id2427679_user_list');
	$id=get_user_id($username);
	$password =md5($password);
	$sql= " SELECT * FROM `user` WHERE `username`='$username' AND `pwd` = '$password' ";
	$result = $conn->query($sql);
    if($result->num_rows == 1)
		return $id;
	else 
      return false;
 }
 function array_sanitize(&$item)
 {
	$conn = new mysqli('localhost', 'id2427679_svkrclg', 'happyacct', 'id2427679_user_list');
    $item =mysqli_real_escape_string($conn, $item);
 }
?>