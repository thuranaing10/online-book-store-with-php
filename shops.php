<?php

	$server = "localhost";
	$username = "root";
	$password = "";
	$dbname = "online_book";
	$conn=mysqli_connect($server,$username,$password,$dbname);
	if(!$conn){
		echo "Not connected..";
	}else{
		//echo "connected...";
	
			$sname = $_POST["sname"];
			$address = $_POST["address"];
			$phone = $_POST["phone"];
			$date = date("Y-m-d");												
			$sql_insert = "INSERT INTO shops(sname,address,phone,date ) VALUES ('$sname','$address','$phone','$date')";
			$result=mysqli_query($conn,$sql_insert);
			if(!$result){
				echo "Please , Enter complete datas..";
			}else{
				echo "Congratulations ,Upload successful...";
			}
	}	
?>