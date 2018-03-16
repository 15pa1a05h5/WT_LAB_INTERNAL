<?php 
include "connect.php";
session_start();
if(isset($_SESSION['email'])) 
    header('location:home.php');
    
    if(isset($_POST['sub'])) {
        $email=$_POST['email'];
        $pass=$_POST['pass'];
        $qry = "SELECT * FROM `user` WHERE  `email`='$email' AND `password`='$pass';";
        $sql = mysqli_query($conn,$qry) or die("Connection failed: " . mysqli_error());
        if(mysqli_num_rows($sql)>0) {
            $row=mysqli_fetch_assoc($sql);
            $_SESSION['id']=$row['id'];
            $_SESSION['name'] = $row['name'];
            $_SESSION["email"] = $row['email'];
            header('location:home.php');
        } else {
            $warning = "Invalid login";
        }
    
    }
?>
<!DOCTYPE html>
<html>
    <head>
            <title>LogIn</title>
    </head>   
    <body>
                <h2>Login</h2>
                <h4> <?php if(isset($warning)) echo $warning; ?></h4>
                <form class="form" method="post" action="">
                Email<input type="text" name="email"><br><br>
                Password<input type="password" name="pass"><br>
                <input type="submit" name="sub" value="Click to Submit">
                 <p>If you have not registered earlier click <a href="register.php">Signup</p>
            </form>
    </body>  
    <style>
    		form{
    			border:2px solid black;
    			text-align:center;
    			float:left;
    			padding:20px;
    			margin:5% 35%;
    			background-color:white;	
		}
		body{
			background-image:url(bg.jpg);
			background-repeat:none;
		}
	</style> 
</html>
