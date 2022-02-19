<?php

$bid = $_GET["bid"];
$server = "localhost";
$username = "root";
$password = "";
$dbname = "online_book";

$conn = mysqli_connect($server,$username,$password,$dbname);

if(!$conn){
	echo "Not connected..";
}else{
	#echo "connected...";
	mysqli_select_db($conn,$dbname);
	$sql_books = "select books.*,authors.aname,categories.cname,shops.sname 
              from books,authors,categories,shops 
              where books.aid = authors.aid AND books.cid = categories.cid AND books.sid =shops.sid AND bid=$bid";
	
	$result = mysqli_query($conn,$sql_books);
	$dyn_table = '<table border="0" cellpadding="10">';

	while($row=mysqli_fetch_array($result)){
		$bid = $row["bid"];
        $bname = $row["bname"];
        $aname = $row["aname"];
        $cname = $row["cname"];
        $price = $row["price"];
        $sname = $row["sname"];
        $image = $row["image"];
        $date = $row["date"];

		
		$dyn_table .='<tr><td>'.'<img src="data:image/jpeg;base64,'.base64_encode($image).' "width="300" height="300">'.'</td></tr>';
		$dyn_table .='<tr><td>'.'<p><strong>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp Book Name&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp:  <strong>'.$bname.
					'<br><strong> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp Author&nbsp&nbsp &nbsp &nbsp &nbsp &nbsp&nbsp&nbsp&nbsp&nbsp   : <strong>'.$aname.
						'<br><strong> &nbsp &nbsp &nbsp &nbsp&nbsp&nbsp&nbsp Category &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp : <strong>'.$cname.
						'<br><strong>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp Price &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp&nbsp&nbsp&nbsp :  <strong>'.$price." Kyats".
						'<br><strong>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp Shop &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp&nbsp&nbsp&nbsp  :  <strong>'.$sname.
						'<br><strong>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp Upload Date &nbsp&nbsp&nbsp&nbsp&nbsp:  <strong>'.$date.
						'</p></td>';
						}
	$dyn_table .='</tr></table>';
	
}
mysqli_close($conn);
?>
<html>
<title></title>
<h2><center>Detail Information</center></h2>
<style>
body{
	font-family:"Times New Roman",Serif;
	background-color:#f4f4f4;
}

h2{
	color:#3b5998;
	font-size:30px;
	padding:10px;
}
</style>
<body>
<center>
<?php
	echo $dyn_table;
?>
</center>
</body>
</html>