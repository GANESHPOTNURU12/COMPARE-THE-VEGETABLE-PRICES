<?php
    session_start();
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

<div id="bestVegDeals" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#bestVegDeals" data-slide-to="0" class="active"></li>
    <li data-target="#bestVegDeals" data-slide-to="1"></li>
    <li data-target="#bestVegDeals" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <div class="item active">
      <img src="images/banner1.jpg" alt="Best Vegetable Deals">
      <div class="carousel-caption">
        <h3>Select</h3>
        <p>Select your item first</p>
      </div>
    </div>

    <div class="item">
      <img src="images/banner2.jpg" alt="Best Vegetable Deals">
      <div class="carousel-caption">
        <h3>Compare</h3>
        <p>Compare the prices in different websites</p>
      </div>
    </div>

    <div class="item">
      <img src="images/banner3.jpg" alt="Best Vegetable Deals">
      <div class="carousel-caption">
        <h3>Buy</h3>
        <p>Navigate to respective website and Buy</p>
      </div>
    </div>
  </div>

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#bestVegDeals" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#bestVegDeals" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

<!-- (About Section) -->
<div id="about" class="container-fluid">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <h2>About Best Veg Deals</h2><br>
        <h4>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, </h4><br>
        <p>and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<br>

        Our aim is to provide healthy and natural products and help people avoid cocktail of chemicals that are present in products available in the market.</p>
        <br><a href="#contact" class="btn btn-default btn-lg">Contact Us</a>
      </div>
    </div>
  </div>
</div>

<div id="mission" class="container-fluid mission-bg">
  <div class="container">
    <div class="row">
      <div class="col-sm-4">
        <img src="images/save.png" class="img-responsive" alt="logo">
      </div>
      <div class="col-sm-8">
        <h2>Our MISSION</h2><br>
        <h4>Lorem Ipsum is simply dummy text of the printing and typesetting industry. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages</h4><br>
        <p>and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
      </div>
    </div>
  </div>
</div>

<?php include 'footer.php'; ?>

<script type="text/javascript" src="js/main.js"></script>
</body>
</html>
