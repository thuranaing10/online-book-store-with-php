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
	
			$cname = $_POST["cname"];
			$date = date("Y-m-d");												
			$sql_insert = "INSERT INTO categories(cname,date ) VALUES ('$cname','$date')";
			$result=mysqli_query($conn,$sql_insert);
			if(!$result){
				echo "Please , Enter complete datas..";
			}else{
				echo "Congratulations ,Upload successful...";
			}
		

	}	
?>