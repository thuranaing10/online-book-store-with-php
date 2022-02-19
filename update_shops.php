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
            $sid = $_GET['id'];
            $sql_select = "select * from shops where sid = $sid";
            mysqli_select_db($conn,$dbname);
            $result = mysqli_query($conn,$sql_select);
            $row = mysqli_fetch_array($result);

            echo "<form method='post' action='update_shops.php'>
            <table>
            <input type='hidden' name='sid' value='".$row['sid']."'><br>
            <tr>
            <td>Shop Name :</td>
             <td><input type='text' name='sname' value='".$row['sname']."'></td>
             </tr>
            <tr>
            <td>Address :</td>
             <td><input type='text' name='address' value='".$row['address']."'></td>
             </tr>
            <tr>
            <td>Phone :</td>
            <td> <input type='text' name='phone' value='".$row['phone']."'></td>
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
            $sid = $_POST["sid"];
            $sname = $_POST["sname"];
            $address = $_POST["address"];
            $phone = $_POST["phone"];
            $date = $_POST["date"];
            
            $update = "update shops set sname='$sname',address='$address',phone='$phone',date='$date' where sid = $sid";

            $result = mysqli_query($conn,$update);

            if($result){
                echo " Editing Successful.... ";
            }else{
                echo "Sorry<br>
                Editing Faided....";
            }
        }


    ?>