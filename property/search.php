<?php 
include "connect.php";
session_start();
if(!isset($_SESSION['email'])) 
    header('location:login.php');
if(isset($_POST['sub'])) {
    $location=$_POST['location'];
 $qry="select * from `prop` where `location` like '$location';";
        mysqli_query($conn,$qry)  or die("error: ".$qry);
 }
?>
<!DOCTYPE html>
<html>
    <head>
            <title>Property</title>
    </head>   
    <body>
                <h2>SearchProperty</h2>
                <h4> <?php if(isset($warning)) echo $warning; ?></h4>
                <form class="form" method="post" action="" >
                Location:<input type="text" name="location"><br><br>
                <input type="submit" name="sub" value="Click to Submit">
                <br><br>
                <?php 
            	 $qry="select * from `prop` where `location` like '$location';";
        	$res=mysqli_query($conn,$qry)  or die("error: ".$qry);
         	if(mysqli_num_rows($res)>0){         	        	
         	echo "<table>";
        	echo "<tr>";
        	echo "<th>";
        	echo "Name";
        	echo "</th>";
        	 echo "<th>";
        	echo "Cost";
        	echo "</th>";
        	  echo "<th>";
        	echo "Description";
        	echo "</th>";
        	echo "</tr>";
		while ($row = mysqli_fetch_assoc($res))
		{
			$name=$row['name'];
			$cost=$row['cost'];
			$description=$row['description'];
			echo "<tr>";
        	echo "<td>";
        	echo  $name;
        	echo "</td>";
        	 echo "<td>";
        	echo $cost;
        	echo "</td>";
        	  echo "<td>";
        	echo $description;
        	echo "</td>";
        	echo "</tr>";
		}	
		echo "</table>";
    }
    else{
    		echo "No properties at that area";
	}

            ?>
            <br><a href="home.php" > Add Property<br>
            <a href="logout.php" >logout
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
		table,td,th{
			border:1px;
		}
	</style>
</html>
