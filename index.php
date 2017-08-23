<?php
include 'init.php';
 if(isset($_GET['message'])==1)
	{      echo 'PLEASE FILL IN THE BLANKS'; }
	
	  else if(isset($_SESSION['user_id']))
		  header("Location: home.php?msg='user_id'");
?>
<html>
    <head>

    </head>
    <body>
	<form method="post" action="login.php">
	   Username:<br>
	   <input type="text" name="username"><br>
	   Password:<br>
       <input type="password" name= "password"><br>
       <input type="submit" value="Login">
<a href="register/register.php">Register</a>	   
	  </form>
	</body>
</html>