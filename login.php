<?php
include 'conn.php';
include 'user.php';
include 'errors.php';
include 'init.php';

$errors=array();
$username=$_POST['username'];
$password=$_POST['password'];
    if(empty($username)||empty($password))
	{  header("Location: index.php?message=1"); }
    else if(user_exists($username)===false)  {
		$errors[]='we can\'t find that username. Not registered yet?';}

    else  {
     $login=login($username, $password);
	 if($login === false)
	 $errors[]='Please enter the correct username or password';
     else
      {
		  $_SESSION['user_id']= $login;
		  header("Location: home.php?msg=".$login);
	  }
	}
	 echo implode(" ", $errors);
	  ?>
	  <a href="register/register.php"> Register.</a>
	  <?php
	 include 'index.php';
	 ?>