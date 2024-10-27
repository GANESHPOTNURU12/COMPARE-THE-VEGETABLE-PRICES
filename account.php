<?php
    include("./actions/db_config.php");
    if(!isset($_SESSION['mapuseremail'])) {
        header('Location: index.php');
    }
    
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Best Vegetable Deals - Natural products, healthy Family</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="./css/bootstrap_3.3.7.min.css">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400|Roboto:300,400" rel="stylesheet"> 
  <script src="./js/jquery_1.12.4.min.js"></script>
  <script src="./js/bootstrap_3.3.7.min.js"></script>
  <link rel="stylesheet" href="css/style.css">
</head>
<body id="home" data-spy="scroll" data-target=".navbar" data-offset="60">

<?php include 'header.php'; ?>

<div id="login" class="container-fluid m-top-50 m-bottom-50">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <h2>My Account</h2>
        <h4>Hello, <?php if(isset($_SESSION['mapusername'])) echo $_SESSION['mapusername']; ?></h4>
        <div class="userdetails">
        <?php
          $query = "SELECT * FROM users WHERE `username` = '".$_SESSION['mapuseremail']."'";
          $result = $mysqli->query($query) or die(mysqli_error());
          while ($row = mysqli_fetch_array($result)) {
            echo "<div class='user-record'> <b>Full Name: </b>". $row["fullname"] . "</div>
            <div class='user-record'> <b>Email Id: </b>". $row["username"] . "</div>
            <div class='user-record'> <b>Password: </b>". $row["pwd"] . "</div>
            <div class='user-record'> <b>Created On: </b>". $row["createdon"] . "</div><br><br>";
          }
        ?>
        </div>
        <button onclick="logout()" class="btn btn-danger">Logout</button>
      </div>
    </div>
  </div>
</div>

<?php include 'footer.php'; ?>

<script type="text/javascript" src="js/main.js"></script>
</body>
</html>
