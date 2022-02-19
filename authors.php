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
	
			$aname = $_POST["aname"];
			$date = date("Y-m-d");
			//echo $conn;
			//var_dump($conn);												
			$sql_insert = "INSERT INTO authors(aname,date ) VALUES ('$aname','$date')";

			$result=mysqli_query($conn,$sql_insert);
			if(!$result){
				echo "Please , Enter complete datas..";
			}else{
				echo "Congratulations ,Upload successful...";
			}
	}	
?>