<?php
    session_start();
    if(isset($_SESSION['mapuseremail'])) {
        header('Location: account.php');
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
        <h2 class="text-center">Login</h2>
        <form action="/action_page.php" class="center-content">
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
            </div>
            <div class="form-group">
                <label for="pwd">Password:</label>
                <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd">
            </div>
            <div class="error p-10 text-center"></div>
            <button type="button" class="btn btn-block btn-primary theme-bg p-10 no-border" onclick="login()">Login</button>
        </form>
      </div>
    </div>
  </div>
</div>

<?php include 'footer.php'; ?>

<script type="text/javascript" src="js/main.js"></script>
</body>
</html>
