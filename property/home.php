<?php 
include "connect.php";
session_start();
if(!isset($_SESSION['email'])) 
    header('location:login.php');
if(isset($_POST['sub'])) {
    $pname = $_POST['propname'];
    $cost=$_POST['cost'];
    $location=$_POST['location'];
    $details=$_POST['details'];
    $id=$_SESSION['id'];
        $qry = "insert into `prop` (`name`,`id`,`cost`,`location`,`description`) VALUES ('$pname', '$id', '$cost','$location','$details');";
        mysqli_query($conn,$qry)  or die("error: ".$qry);
        header('location:login.php');
    }
?>
<!DOCTYPE html>
<html>
    <head>
            <title>Property</title>
    </head>   
    <body>
                <h2>Add Property</h2>
                <h4> <?php if(isset($warning)) echo $warning; ?></h4>
                <form class="form" method="post" action="" enctype="multipart/form-data">
                Property Name:<input type="text" name="propname"><br><br>
                Location:<input type="text" name="location"><br><br>
                cost<input type="text" name="cost"><br><br>
                Description<textarea name="details" style="width:100%;height:100px;"></textarea><br><br>
                <input type="submit" name="sub" value="Click to Submit"><br><br>
           		 <a href="logout.php" >logout
            <a href="search.php" >search
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
