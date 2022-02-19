<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form method="post" action="upload.php">
		<?php
			$name = $_POST["name"];
			$pass = $_POST["pass"];
			if($name == "1234" && $pass == "1234"){
				echo "Login successful....<br>";
				echo "<input type='submit' name='submit' value='OK'>";
			}else{
				echo "Login failed.....";
			}

		?>


		
	</form>

</body>
</html>