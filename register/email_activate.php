<?php
include '/storage/ssd2/679/2427679/public_html/init.php';
include '/storage/ssd2/679/2427679/public_html/user.php';
if(isset($_GET['usrn']) && isset($_GET['email_code']))
{
   $username=$_GET['usrn'];
   $email_code=$_GET['email_code'];
   $conn = new mysqli('localhost', 'id2427679_svkrclg', 'happyacct', 'id2427679_user_list');
   $sql = "UPDATE user 
          SET email_state='1'
          WHERE `username`= '$username' AND `email_code`='$email_code'";
	   if ($conn->query($sql) === true) 
	     {
		 header("Location: ../home.php");
             }
         else 
             echo "ERROR". $username=$_GET['usrn']."   " .$email_code=$_GET['email_code'];
}
else
header("Location: ../index.php");
?>