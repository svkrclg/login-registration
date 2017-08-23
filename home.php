<?php
include 'init.php';

 if (isset($_SESSION['user_id']))

 {
	 if(isset($_GET['msg']))

	  {
	   $conn = new mysqli('localhost', 'id2427679_svkrclg', 'happyacct', 'id2427679_user_list');

	   $msg=$_SESSION['user_id'];

       $sql = "SELECT *  FROM user WHERE `user_id`= $msg";

       $result = $conn->query($sql);

	   if ($result->num_rows > 0)
 
	     {
		  $row = $result->fetch_assoc();

          if($row["email_state"]==0)

		  {
                          $admin_email="svkrclg@gmail.com";

			  echo $row["firstname"]. ', Please verify your Email-id. we have sent a link';

                          mail($row['email'] ,"Verify the email. Click on the URL", "https://happyacct.000webhostapp.com/register/email_activate.php?usrn=".$row['username'] ."&email_code=".$row['email_code'] , "From:" . $admin_email);

                           ?>

			  <body>

			  <a href="logout.php">LOG OUT</a>

<div id="nav">
			<ul>

				<li><a href="https://www.onlineexambuilder.com/phase-1/exam-171526">CLICK TO START EXAM</a></li>
			</ul>	
		</div>
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