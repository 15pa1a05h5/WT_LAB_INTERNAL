<?php 
include "connect.php";
session_start();
if(isset($_POST['sub'])) {
        $name=$_POST['name'];
        $email=$_POST['email'];
        $pass=$_POST['pass'];
        $repass=$_POST['repass'];
        if($pass!=$repass){
        	$warning="Passwords not matched";
	}
        $qry = "INSERT INTO `user` ( `name`, `email`, `password`) VALUES ('$name', '$email', '$pass')";
        mysqli_query($conn,$qry) or die("Connection failed: " . mysqli_error());
       	header('location:login.php');
    }
?>
<!DOCTYPE html>
<html>
    <head>
            <title>Property</title>
    </head>   
    <body>
                <h2>Register</h2>
                <form class="form" method="post" >
                Name<input type="text" name="name"><br><br>
                Email<input type="text" name="email"><br><br>
                Password<input type="password" name="pass"><br><br>
                Retype Password <input type="text" name="repass"><br><br>
                <input type="submit" name="sub" value="Click to Submit"><br>
                <p>If you are already registered click <a href="login.php">login</p>
            </form>
            
    </body>
	    <style>
    		form{
    			border:1px solid ;
    			text-align:center;
    			float:left;
    			padding:25px;
    			margin-left:35%;
    			background-color:white;	
		}
		body{
			background-image:url(bg.jpg);
			background-repeat:none;
		}
	</style> 
</html>
