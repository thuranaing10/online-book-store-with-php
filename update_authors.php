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
        	$aid = $_GET['id'];
        	$sql_select = "select * from authors where aid = $aid";
        	mysqli_select_db($conn,$dbname);
        	$result = mysqli_query($conn,$sql_select);
        	$row = mysqli_fetch_array($result);

        	echo "<form method='post' action='update_authors.php'>
        	<table>
        	<input type='hidden' name='aid' value='".$row['aid']."'><br>
        	<tr>
        	<td>Category Name :</td>
        	 <td><input type='text' name='aname' value='".$row['aname']."'></td>
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
        	$aid = $_POST["aid"];
        	$aname = $_POST["aname"];
        	$date = $_POST["date"];

        	$update = "update authors set aname='$aname',date='$date' where aid = $aid";

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