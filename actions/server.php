<?php 
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST");
header("Access-Control-Allow-Headers: *");
header("Content-Type: application/json; charset=utf-8");
include("db_config.php");
    if(isset($_POST['login'])) {
        $email=$_POST['email'];
        $pwd=$_POST['pwd'];
        $query = "SELECT * FROM users WHERE username='".$email."' AND pwd='".$pwd."'";
        $result = $mysqli->query($query) or die(mysqli_error());
        $numRows = mysqli_num_rows($result);
        if ($numRows) {
            $_SESSION['mapuseremail'] = $email;
            while($row = mysqli_fetch_array($result)){
                $_SESSION['mapusername'] = $row['fullname'];
            }
            echo "success";

        }else{
            echo "failed";
        }
    }

    if(isset($_POST['register'])) {
        $fullname=$_POST['fullname'];
        $email=$_POST['email'];
        $pwd=$_POST['pwd'];
        $query = "SELECT * FROM users WHERE username='".$email."'";
        $result = $mysqli->query($query) or die(mysqli_error());
        $numRows = mysqli_num_rows($result);
        if ($numRows) {
            echo "duplicate";
        } else {
            $sql="INSERT INTO `users` (`fullname`, `username`, `pwd`) VALUES ('$fullname', '$email', '$pwd')";
            if ($mysqli->query($sql) === TRUE) {
                $_SESSION['mapuseremail'] = $email;
                $_SESSION['mapusername'] = $fullname;
                echo "success";
            } else{
                echo "failed";
            }
        }


    }

    if(isset($_GET['action'])) {
        if($_GET['action'] == 'get_list') {
            $sql = "SELECT * FROM all_prices";
            $result = $mysqli->query($sql);
            $output = null;
            while($row = mysqli_fetch_assoc($result)){
                $output[] = $row;
            }
            if ($output) {
                echo json_encode($output);
            } else {
                echo $output;
            }
        }
    }

    if(isset($_POST['logout'])) {
        unset($_SESSION['mapuseremail']);
        unset($_SESSION['mapusername']);
    }
?>