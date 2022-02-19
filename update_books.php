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
        	$bid = $_GET['id'];
        	$sql_select = "select books.*,authors.aname,categories.cname,shops.sname 
                           from books,authors,categories,shops 
                            where books.aid = authors.aid AND books.cid = categories.cid AND books.sid =shops.sid AND books.bid = $bid";
        	mysqli_select_db($conn,$dbname);
        	$result = mysqli_query($conn,$sql_select);
        	$row = mysqli_fetch_array($result);
            //$image = $row["image"];

        	echo "<form method='post' action='update_books.php'>
        	<table>
        	<input type='hidden' name='bid' value='".$row['bid']."'><br>
        	<tr>
        	<td>Book Name :</td>
        	 <td><input type='text' name='bname' value='".$row['bname']."'></td>
        	</tr>
            <td>Author Name :</td>
             <td><input type='text' name='aname' value='".$row['aname']."'></td>
            </tr>
            <td>Category Name :</td>
             <td><input type='text' name='cname' value='".$row['cname']."'></td>
            </tr>
            <td>Price :</td>
             <td><input type='text' name='price' value='".$row['price']."'></td>
            </tr>
            <td>Shop Name :</td>
             <td><input type='text' name='sname' value='".$row['sname']."'></td>
            </tr>
            <td>Image :</td>
             <td><input type='file' name='image' value='".$row["image"]."'</td>
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
        	$bid = $_POST["bid"];
        	$bname = $_POST["bname"];
            $aname = $_POST["aname"];
            $cname = $_POST["cname"];
            $price = $_POST["price"];
            $sname = $_POST["sname"];
            $image = $_POST["image"];
            
        	$date = $_POST["date"];

        	$update = "update books set bname='$bname',aname='$aname',cname='$cname',price='$price',sname='$sname',image='$image',date='$date' where bid = $bid";

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