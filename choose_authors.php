<?php
session_start();
  $server = "localhost";
  $username = "root";
  $pass = "";
  $dbname = "online_book"; 

  $conn = mysqli_connect($server,$username,$pass,$dbname);

  if(!$conn){
    echo "not connection..";
  }else{

  }
  mysqli_select_db($conn,$dbname);

  #for categories
  $nav_categories = "select * from categories";
  $c = mysqli_query($conn,$nav_categories);
   $c_option = '';
  while($row=mysqli_fetch_array($c)){
          //$cid = $row["cid"];
            //$cname = $row["cname"];
    $c_option .= '<a class="dropdown-item text-info english" href="#">'.$row['cname'].' </a>';
  }

  # for authors
  $nav_authors = "select * from authors";
  $a = mysqli_query($conn,$nav_authors);
  $a_option = '';
  while($row=mysqli_fetch_array($a)){
          //$cid = $row["cid"];
            //$cname = $row["cname"];
    $a_option .= '<a class="dropdown-item text-info english" href="#">'.$row['aname'].' </a>';
           
  }
?>


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
  <!--Navagation Start-->
  <nav class="container navbar navbar-expand-lg navbar-light">
    <a class="navbar-brand english text-info" href="home.php">Home</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown " aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav ml-auto">
        
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle english text-info" href="#" id="navbarDropdownMenuLink"  role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Categories
          </a>
          <div class="dropdown-menu dd" aria-labelledby="navbarDropdownMenuLink">
            
            <?php
              echo $c_option;
            ?>
             <!--<a class="dropdown-item english text-info" href="#">Religious</a>
              <a class="dropdown-item english text-info" href="#">Love</a>
              <a class="dropdown-item english text-info" href="#">Comedy</a>
              <a class="dropdown-item english text-info" href="#">Biography</a>
              <a class="dropdown-item english text-info" href="#">IT</a>-->
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle english text-info" href="#" id="navbarDropdownMenuLink"  role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Authors
          </a>
          <div class="dropdown-menu dd" aria-labelledby="navbarDropdownMenuLink">
              <?php
                echo $a_option;
              ?>
          </div>
        </li>

        <li class="nav-item">
          <a class="nav-link english text-info" href="#">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link english text-info" href="login.php">Login</a>
        </li>
      </ul>
    </div>
  </nav>
  <!--Navigation End-->
</section> 
<br>
 <?php
    $aid = $_GET["aid"];
    $sql_books ="select books.*,authors.aname from books,authors,categories
              where books.aid = authors.aid AND books.cid = categories.cid AND authors.aid = $aid ORDER BY bid DESC";

    $b_table = '<table cellpadding="30">';
    $i = 0;
    $books = mysqli_query($conn,$sql_books);
    while($row=mysqli_fetch_array($books)){
      $bid = $row["bid"];
      $bname = $row["bname"];
      $aname = $row["aname"];
     // $cname = $row["cname"];
     // $price = $row["price"];
      //$sname = $row["sname"];
      $image = $row["image"];
     // $date = $row["date"];
    
    
      if($i%4==0){        
        $b_table .='<tr><td>'.'<a href="books_details.php?bid='.$bid.'" text_decoration=none>'
            .'<img src="data:image/jpeg;base64,'.base64_encode($image)
            .' "width="250" height="250">'.'</a>'.
            '<center><p><strong>Book Name :<strong>'.$bname.'</p></center>'.
            '<center><p><strong>Author Name :<strong>'.$aname.'</p></center>'
            .'</td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>';
      }else{
        $b_table .='<td>'.'<a href="books_details.php?bid='.$bid.'" text_decoration=none>'
            .'<img src="data:image/jpeg;base64,'.base64_encode($image)
            .' "width="250" height="250">'.'</a>'.
            '<center><p><strong>Book Name :<strong>'.$bname.'</p></center>'.
            '<center><p><strong>Author Name :<strong>'.$aname.'</p></center>'.
            '</td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<td>';
      }
      $i++; 
    }
    $b_table .= '</tr></table>';

  //}
?>
<center>
<?php
  echo $b_table;
  
?>
</center>





<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/teter.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/scrollreveal.js"></script>
</body>
</html>