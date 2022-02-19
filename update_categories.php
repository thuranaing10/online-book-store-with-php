<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php

        $server = "localhost";
        $username = "root";
        $password = "";
        $dbname = "online_book";

        $conn = mysqli_connect($server,$username,$password,$dbname);

        if(!$conn){
            echo "Not connected..";
        }else{
            //secho "connected...";
        }
        if(!isset($_POST['submit'])){
        	$cid = $_GET['id'];
        	$sql_select = "select * from categories where cid = $cid";
        	mysqli_select_db($conn,$dbname);
        	$result = mysqli_query($conn,$sql_select);
        	$row = mysqli_fetch_array($result);

        	echo "<form method='post' action='update_categories.php'>
        	<table>
        	<input type='hidden' name='cid' value='".$row['cid']."'><br>
        	<tr>
        	<td>Category Name :</td>
        	 <td><input type='text' name='cname' value='".$row['cname']."'></td>
        	 </tr>
        	<tr>
        	<td>Date :</td>
        	<td> <input type='text' name='date' value='".$row['date']."'></td>
        	</tr>
        	<tr>
        	<td><input type='submit' name='submit' value='OK'></td>
        	</tr>
        	</table></form>";
        }else{
        	$cid = $_POST["cid"];
        	$cname = $_POST["cname"];
        	$date = $_POST["date"];

        	$update = "update categories set cname='$cname',date='$date' where cid = $cid";

        	$result = mysqli_query($conn,$update);

        	if($result){
        		echo " Editing Successful.... ";
        	}else{
        		echo "Sorry<br>
        		Editing Faided....";
        	}
        }


    ?>
</body>
</html>