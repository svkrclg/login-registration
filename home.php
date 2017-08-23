<?php
include 'init.php';

 if (isset($_SESSION['user_id']))

 {
	 if(isset($_GET['msg']))

	  {
	   $conn = new mysqli('your_host', 'username', 'password', 'databasename');

	   $msg=$_SESSION['user_id'];

       $sql = "SELECT *  FROM tablename WHERE `user_id`= $msg";

       $result = $conn->query($sql);

	   if ($result->num_rows > 0)
 
	     {
		  $row = $result->fetch_assoc();

          if($row["email_state"]==0)

		  {
                          $admin_email="svkrclg@gmail.com";

			  echo $row["firstname"]. ', Please verify your Email-id. we have sent a link';

                          mail($row['email'] ,"Verify the email. Click on the URL", "https://127.0.0.1/email_activate.php?usrn=".$row['username'] ."&email_code=".$row['email_code'] , "From:" . $admin_email);

                           ?>

			  <body>

			  <a href="logout.php">LOG OUT</a>
			  </body>

			 <?php

		  }

          else
 
	        {
			  echo "Hello, User!";
 
			  ?>

			  <body>



				  <a href="logout.php">LOGOUT</a>

			  </body>

			 <?php

	        }

		 }

	   else

		  echo "Sorry, we\'re facing some trouble...Try again letter";

	  }

     else

       header('Location: index.php');
		

}

else
 
{
	 header('Location: index.php');

}
?>
