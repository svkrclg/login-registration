<?php
include 'init.php';
include 'user.php';
if(isset($_GET['usrn']) && isset($_GET['email_code']))
{
   $username=$_GET['usrn'];
   $email_code=$_GET['email_code'];
   $conn = new mysqli('your_host', 'username', 'password', 'databasename');
   $sql = "UPDATE tablename 
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
