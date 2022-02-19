<?php
	if(isset($_POST['submit'])) {

		//$check=getimagesize($_FILES["image"]["tmp_name"]);

		$server = "localhost";
		$username = "root";
		$password = "";
		$dbname = "online_book";

				

		$conn=mysqli_connect($server,$username,$password,$dbname);
		if(!$conn){
			echo "Not connected..";
		}else{
			//echo "connected...<br>";

			$bname = $_POST["bname"];
			$aname = $_POST["aname"];
			$category = $_POST["category"];
			$price = $_POST["price"];
			$shops = $_POST["shops"];
			$date = date("Y-m-d");	


			$check = getimagesize($_FILES["image"]["tmp_name"]);
			if($check != null){

				$image = $_FILES["image"]["tmp_name"];
				$imageContent = addslashes(file_get_contents($image));
				//$image= addslashes(file_get_contents($_FILES['image']['tmp_name']));

				
				$sql_insert = "INSERT INTO books(bname,aid,cid,price,sid,image,date ) VALUES ('$bname','$aname','$category','$price','$shops','$imageContent','$date')";

				$result = mysqli_query($conn,$sql_insert);
				if($result){
					echo "Congratulations ,Upload successful...";
					
				}else{
					echo "Please , Enter complete datas..";
				}
			}
		}
	}
	mysqli_close($conn);

?>
