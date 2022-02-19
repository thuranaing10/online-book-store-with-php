
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

        $sql_authors = "SELECT  * FROM authors";
        $authors = mysqli_query($conn,$sql_authors);

        $sql_categories = "select * from categories";
        $categories = mysqli_query($conn,$sql_categories);

        $sql_shops = "select * from shops";
        $shops = mysqli_query($conn,$sql_shops);
        
        #for authors
        $a_option = '';
        while($row=mysqli_fetch_array($authors)){
            
            $a_option .= '<option value="'.$row['aid'].'">'.$row['aname'].' </option>';
            
        }

    #for categories
         $c_option = '';
        while($row=mysqli_fetch_array($categories)){
            //$cid = $row["cid"];
            //$cname = $row["cname"];
            $c_option .= '<option value="'.$row['cid'].'">'.$row['cname'].' </option>';
            
        }

    #for shops
         $s_option = '';
        while($row=mysqli_fetch_array($shops)){
            //$sid = $row["sid"];
            //$sname = $row["sname"];
            $s_option .= '<option value="'.$row['sid'].'">'.$row['sname'].' </option>';
            
        }
    }
    mysqli_close($conn);
?>  
<html>
<head>
<script src="js/jquery.js"></script>
<link rel="stylesheet" href="css/tab_style.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="vendor/fontawesome-free/css/all.min.css">
    <link href="css/custom.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="css/animate.css">
<script>
$(document).ready(function(){
    $(".tab-list").on("click", ".tab", function(e) {
        e.preventDefault();

        $(".tab").removeClass("active");
        $(".tab-content").removeClass("show");
        $(this).addClass("active");
        $($(this).attr("href")).addClass("show");
    });


});

</script>
<style type="text/css">
    a{
        text-decoration: none;
    }
</style>

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
    <center>
    <p>You can upload in the following box:</p>
<div class="tabs">
    <nav class="tab-list">
        <a class="tab active text-primary" href="#categories">Categories</a>
        <a class="tab text-primary" href="#authors">Authors</a>
        <a class="tab text-primary" href="#shops">Shops</a>
        <a class="tab text-primary" href="#books">Books</a>
    </nav>

    <div id="categories" class="tab-content show">
        <form action="categories.php" method="post">
            <center>
            <table cellpadding="15">
            <tr>
                <td>Category Name:</td>
                <td><input type="text" id="cname" name="cname" required="required"></td>
            </tr>
            
            <tr><td><center><input type="submit" id="btn" value="Upload"></center></td></tr>

            </table>
            </center>
        </form>
    </div>

    <div id="authors" class="tab-content">
        <form action="authors.php" method="post">
            <center>
            <table cellpadding="15">
            <tr>
                <td>Author Name:</td>
                <td><input type="text" id="aname" name="aname" required="required"></td>
            </tr>
            <tr><td><center><input type="submit" id="btn" value="Upload"></center></td></tr>

            </table>
            </center>
        </form>
    </div>
    <div id="shops" class="tab-content">
        <form action="shops.php" method="post">
            <center>
            <table cellpadding="15">
            <tr>
                <td>Shop Name:</td>
                <td><input type="text" id="sname" name="sname" required="required"></td>
            </tr>
            <tr>
                <td>Address:</td>
                <td><input type="text" id="address" name="address" required="required"></td>
            </tr>
            <tr><td>Phone :</td>
                <td><input type="text" id="phone" name="phone" required="required"></td>
            </tr>
            
            <tr><td><center><input type="submit" id="btn" value="Upload"></center></td></tr>

            </table>
            </center>
        </form>
        
    </div>

    <div id="books" class="tab-content">
       <form action="books.php" method="post" enctype="multipart/form-data">
            <center>
            <table cellpadding="15">
            <tr>
                <td>Book Name:</td>
                <td><input type="text" id="book" name="bname" required="required" placeholder="Book Name"></td>
            </tr>
            <tr>
                <td>Author Name:</td>
                <td><select name="aname">
                        <?php echo $a_option; ?>
                    </select>
                    
                </td>
            </tr>
            <tr><td>Book Category :</td>
                <td><select name="category" required="required">
                        <?php echo $c_option; ?>
                    </select>
                </td>
            </tr>
            <tr><td>Price :</td>
                <td><input type="text" id="price" name="price" required="required" placeholder="price">Ks</td>
            </tr>
            <tr><td>Book Shops :</td>
                <td>
                    <select name="shops" required="required">
                        <?php echo $s_option; ?>
                    </select>
                </td>
            </tr>
            <tr><td>Image :</td>
                <td><input type="file" id="image" name="image" required="required"></td>
            </tr>
            
            <tr>
                <td><center><input type="submit" id="btn" value="Upload" name="submit"></center></td>
            </tr>
            </table>
            </center>
        </form> 
    </div>
</div>
</center>

<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/teter.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/scrollreveal.js"></script>
</body>
</html>