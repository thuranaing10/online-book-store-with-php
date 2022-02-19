<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="vendor/fontawesome-free/css/all.min.css">
    <link href="css/custom.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="css/animate.css">
</head>
<body>

<section class="container-fluid section-data navsection ">
    <ul class="nav center">
        <li class="nav-item">
            <a class="navbar-brand english text-info" href="upload.php">Upload</a>
        </li>
        <li class="nav-item">
            <a class="navbar-brand english text-info" href="edit.php">Edit & Delete</a>
        </li>
        <li class="nav-item">
            <a class="navbar-brand english text-info" href="home.php">Logout</a>

    </ul>
</section> 
<br><br>
<center>
        <a href="edit_books.php" class="english bigTitle">Books</a>&nbsp&nbsp&nbsp

        <a href="edit_authors.php" class="english bigTitle">Authors</a>&nbsp&nbsp&nbsp
    
        <a href="edit_categories.php" class="english bigTitle">Categories</a>&nbsp&nbsp&nbsp

        <a href="edit_shops.php" class="english bigTitle">Shops</a>
</center>
<br><br><br>
<div>
    <form action="#" method="post">
            <?php

                    $server = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "online_book";

                    $conn = mysqli_connect($server,$username,$password,$dbname);


                    if(!$conn){
                        echo "Not connected..";
                    }else{
                    //echo "connected...";
                        //$bid = $_GET['id'];
                        mysqli_select_db($conn,$dbname);
                        echo "<table border='1' width='70%' cellpadding='0' align='center'>
                        <tr align='center' bgcolor='lightblue'>
                            <th widht='25%'>BID</th>
                            <th widht='25%'>Book Name</th>
                            <th widht='25%'>Author</th>
                            <th widht='25%'>Categories</th>
                            <th widht='25%'>Price</th>
                            <th widht='25%'>Shops</th>
                            <th widht='25%'>Photo</th>
                            <th widht='25%'>Date</th>
                            <th widht='25%'>Operations</th>
                            
                            </tr>";

                         /*$sql_books = "select books.*, authors.aname,categories.cname,shops.sname 
                                from books,authors,categories,shops
                            where authors.aname in (
                                select aname from authors
                                group by aname 
                                having count(1) > 1)
                            AND where categories.cname in (
                                select cname from categories
                                group by cname 
                                having count(1) > 1)
                            AND where shops.sname in (
                                select sname from shops
                                group by sname 
                                having count(1) > 1) 
                            ";*/

                        $sql_books = "select books.*,authors.aname,categories.cname,shops.sname 
                           from books,authors,categories,shops 
                            where books.aid = authors.aid AND books.cid = categories.cid AND books.sid =shops.sid ";
                       // $sql_books = "";
                        

                        $books = mysqli_query($conn,$sql_books);
                        while($row=mysqli_fetch_array($books)){
                            $bid = $row["bid"];
                            $bname = $row["bname"];
                            $aname = $row["aname"];
                            $cname = $row["cname"];
                            $price = $row["price"];
                            $sname = $row["sname"];
                            $image = $row["image"];
                            $date = $row["date"];

                            echo "<tr align='center'>";
                            echo "<td>".$bid."</td>";
                            echo "<td>".$bname."</td>";
                            echo "<td>".$aname."</td>";
                            echo "<td>".$cname."</td>";
                            echo "<td>".$price."</td>";
                            echo "<td>".$sname."</td>";
                            //echo "<td>".$image."</td>";
                            echo "<td>".'<img src="data:image/jpeg;base64,'.base64_encode($image).' "width="50" height="50">'."</td>";
                            echo "<td>".$date."</td>";
                            echo "<td><button class='btn btn-warning text-info'><a href='update_books.php?id=".$bid."'>Edit</a></button>
                            <button class='btn btn-danger text-info'><a href='delete_books.php?id=".$bid."'>Delete</a></button>

                            </td>";
                            echo "</tr>";
                        }
                    echo "</table>";
                }
                mysqli_close($conn);
            ?>

    </form>
</div>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/teter.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/scrollreveal.js"></script>
</body>
</html>
