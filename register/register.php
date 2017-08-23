<?php
include 'init.php';
include 'user.php';
if(isset($_GET['message']) == 1)
    {   echo "Username already selected. Try another. ";
        $_GET['message']=0; 
    }

else if(isset($_POST['submit']))
{
	$username=$_POST['username'];
	$password=$_POST['password'];
   if(user_exists($_POST['username']) === true)
	header("Location: register.php?message=1");
   else {
	$register_data = array(
							'username' => $_POST['username'],
							'firstname' => $_POST['first_name'],
							'lastname' => $_POST['last_name'],
							'email'   => $_POST['email'],
                                                        'email_code' =>md5( $_POST['username'] + microtime()),
							'pwd' => $_POST['password'],
							);
	if(register_user($register_data) === true)
	   {
		   $login=login($username, $password);
		   $_SESSION['user_id']= $login;
		   header('Location: ../home.php?msg=$login');
	   }		
      } 
}
?>
<html>
<head>
	<script type="text/javascript">
	  function validate_username()
	  {
		  
		  var x=myform.username.value;
		  document.getElementById('msg1').innerHTML="";
		  var c=x.search(' ');
		    if(c!=-1)
				 document.getElementById('msg1').innerHTML=" Spaces not allowed";
	  }
	  function validate_password()
	  {
		    var x=myform.password.value;
		  document.getElementById('msg2').innerHTML="";
		  if(x.length<6)
			  document.getElementById('msg2').innerHTML=" Password must be aleast 6 characters";
	  }
	  function validate_password_again()
	  {
		    var x1=myform.password_again.value;
			var x2=myform.password.value;
		  document.getElementById('msg3').innerHTML="";
		  if(x1.length<6)
			  document.getElementById('msg3').innerHTML=" Password must be aleast 6 characters";
		  if(x1.localeCompare(x2)!=0)
			  document.getElementById('msg3').innerHTML=" Password doesn't match";
	  }
	  function validate_firstname()
	  {
		  var x=myform.first_name.value;
		  document.getElementById('msg4').innerHTML="";
		  for(var i=0;i<x.length;i++)
		  {
			  var z=x.charCodeAt(i);
			  if(!  ( (z>=97 && z<=122)  || (z>=65 &&z<=90) || (x[i]=='.')    ))
			  { document.getElementById('msg4').innerHTML=" Must contain character";  
	    		break;  
    		  }		  
              			 
		  }
	  }
	  function validate_lastname()
	  {
		  var x=myform.last_name.value;
		  document.getElementById('msg5').innerHTML="";
		  for(var i=0;i<x.length;i++)
		  {
			  var z=x.charCodeAt(i);
			  if(!  ( (z>=97 && z<=122)  || (z>=65 &&z<=90) || (x[i]=='.')    ))
			  { document.getElementById('msg5').innerHTML=" Must contain character";  
	    		break;  
    		  }		  
              			 
		  }
	  }
	  function validate_email()
	  {
		  var x=myform.email.value;
		  document.getElementById('msg6').innerHTML="";
		  var atpos = x.indexOf("@");
          var dotpos = x.lastIndexOf(".");
         if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length)
               document.getElementById('msg6').innerHTML="*Invalid E-mail"; 
         else     
          document.getElementById('msg6').innerHTML="";  
          
	  }
	  function nananan()
	  {
		   var x1=document.getElementById('msg1').innerHTML;
		   var x2=document.getElementById('msg2').innerHTML;
		   var x3=document.getElementById('msg3').innerHTML;
		   var x4=document.getElementById('msg4').innerHTML;
		   var x5=document.getElementById('msg5').innerHTML;
		   var x6=document.getElementById('msg6').innerHTML;
		   if(x1=="" && x2=="" && x3=="" && x4=="" && x5=="" && x6=="")
			   return true;
		   else 
		   {   
	            alert("Please input valid.");
			   return false;
		   }
		   
	  }	  
</script>

<style type ="text/css">
  p{
	display:inline;
	color:red;
}
</style>
</head>
<body>

	<form name ="myform" action="" method="post" onsubmit="return nananan()" >
		 Username*: <br>
		 <input type="text" name = "username" onblur="validate_username()" required><p id= "msg1"></p><br>
		 Password*: <br>
		 <input type="password" name = "password" onblur="validate_password()" required><p id= "msg2"></p><br>
		 Repeat password*: <br>
		 <input type="password" name = "password_again" onblur="validate_password_again()" required><p id= "msg3"></p><br>
		 First name*: <br>
		 <input type="text" name = "first_name" onblur="validate_firstname()" required><p id= "msg4"></p><br>
		 Last name: <br>
		 <input type="text" name = "last_name" onblur="validate_lastname()" ><p id="msg5"></p><br>
		 Email*: <br>
		 <input type="text" name = "email" onblur="validate_email()" required><p id="msg6"></p><br>
	     <input type = "submit"  name="submit"value = "Register">
</form>

	
</body>
</html>
