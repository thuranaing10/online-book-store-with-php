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
         $cid = $_GET['id'];
           
        //$cid = $_POST["cid"];
            //$cname = $_POST["cname"];
            //$date = $_POST["date"];

        $delete = "delete from categories where cid = $cid";

        $result = mysqli_query($conn,$delete);

        if($result){
            echo " Delete Successful.... ";
        }else{
            echo "Sorry<br>
             delete Faided....";
        }
    }


?>