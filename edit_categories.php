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
        </li>
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
                        mysqli_select_db($conn,$dbname);
                        echo "<table border='1' width='50%' cellpadding='0' align='center'>
                        <tr align='center' bgcolor='lightblue'>
                            <th widht='25%'>CID</th>
                            <th widht='25%'>Book Categories</th>
                            <th widht='25%'>Date</th>
                            <th widht='25%'>Operations</th>
                            
                            </tr>";

                        $sql_categories = "select * from categories";
                        $categories = mysqli_query($conn,$sql_categories);

                        while($row=mysqli_fetch_array($categories)){
                            $cid = $row["cid"];
                            $cname = $row["cname"];
                            $date = $row["date"];

                            echo "<tr align='center'>";
                            echo "<td>".$cid."</td>";
                            echo "<td>".$cname."</td>";
                            echo "<td>".$date."</td>";
                            echo "<td><button class='btn btn-warning text-info'><a href='update_categories.php?id=".$cid."'>Edit</a></button>
                            <button class='btn btn-danger text-info'><a href='delete_categories.php?id=".$cid."'>Delete</a></button>

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
