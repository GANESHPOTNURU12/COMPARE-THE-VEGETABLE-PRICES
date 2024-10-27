<?php
    session_start();
    if(!isset($_SESSION['mapuseremail'])) {
        header('Location: login.php');
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
  <script>
    fetch('./actions/server.php?action=get_list').then(function(response) {
      return response.json();
    }).then(function(data) {
      dataList = data;
      if(data?.length === 0) {
        document.getElementsByClassName('items')[0].innerHTML = '<h3>No items found!</h3>'
      } else {
        uiElements = '';
        data.forEach((item) => {
          uiElements = uiElements + renderItem(item);
        });
        document.getElementsByClassName('items')[0].innerHTML = uiElements;
      }
    }).catch(function(err) {
      console.log('GET data error from Server: ', err);
      document.getElementsByClassName('items')[0].innerHTML = '<h3>Failed on Server!</h3>';
    });

    function getLink(item) {
      if(item?.Source === 'jio_mart') {
        return 'https://www.jiomart.com'+item?.links;
      }
      if(item?.Source === 'flip') {
        return 'https://www.flipkart.com'+item?.links;
      }
    }

    function renderItem(item) {
      let ele = '';
      ele = ele + '<a target="_blank" href="'+ getLink(item) +'">"<div class="item text-center"><img src="'+ item?.image_links +'" alt="item"><div class="title">'+ item?.Product_name +'</div><div class="price"><span>Price: ₹'+ item?.Special_price +'</span></div></div></a>';
      return ele;
    }
  </script>
</head>
<body id="home" data-spy="scroll" data-target=".navbar" data-offset="60">

<?php include 'header.php'; ?>

<div id="login" class="container-fluid m-top-50 m-bottom-50">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <h2>View All</h2>
        <div class="items">
          Loading...
        </div>
      </div>
    </div>
  </div>
</div>

<?php include 'footer.php'; ?>

<script type="text/javascript" src="js/main.js"></script>
</body>
</html>
