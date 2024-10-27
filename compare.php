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
    vegetablesList = ['Sweet Corn', 'Potato', 'Onion', 'Tomato', 'Lauki', 'Drumstick', 'Green Capsicum', 'Cucumber', 'Sweet Potato', 
    'Bhendi', 'Mushroom', 'Chilli', 'Bottle Gourd', 'Ginger', 'Garlic', 'Cabbage', 'Ladies Finger', 'Coconut', 
    'Cauliflower', 'Capsicum', 'Broccoli', 'Beetroot', 'Carrot', 'Colocasia Arvi', 'Lemon', 'BeansFrench', 'ChowChow', 
    'Bitter gourd', 'Raw Banana', 'Beans Cluster', 'Brinjal', 'Coccinia'];
    fetch('./actions/server.php?action=get_list').then(function(response) {
      return response.json();
    }).then(function(data) {
      dataList = data;
      if(data?.length === 0) {
        document.getElementsByClassName('items')[0].innerHTML = '<h3>No items found!</h3>'
      } else {
        uiElements = '';
        comparedItems=[];
        vegetablesList.forEach((rawItem) => {
          let matchedItems = [];
          data.forEach((item) => {
            if((item?.Product_name?.trim()?.replace(/\s/g, "").toLowerCase()).indexOf(rawItem?.replace(/\s/g, "").toLowerCase()) != -1) {
              matchedItems.push(item);
            }
          });
          if(matchedItems?.length > 0) {
            comparedItems.push({name: rawItem, src_path: matchedItems[0]?.image_links, items: matchedItems});
          }
        });
        console.log(comparedItems);
        comparedItems.forEach((item) => {
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
// <a target="_blank" href="'+ getLink(item) +'">"
    function renderItem(item) {
      let ele = '';
      ele = ele + '<div class="item-container"><div class="left-container text-center"><img src="'+ item?.src_path +'" alt="item"><div class="title"><h3>'+ item?.name +'</h3></div></div>';
      ele = ele + '<div class="right-container">';
      
      item?.items.forEach((citem) => {
          ele = ele + '<a href="'+ getLink(citem) +'" target="_blank"><div class="title">'+ citem?.Product_name +'</div><div class="price">';
          if(citem?.Source === 'flip') {
            ele = ele + '<span><img src="images/flipkart.png" alt="item"></span>&nbsp;&nbsp;&nbsp;&nbsp;<span>Price: ₹'+ citem?.Special_price +'</span>';
          } else if(citem?.Source === 'jio_mart') {
            ele = ele + '<span><img src="images/jiomart.png" alt="item"></span>&nbsp;&nbsp;&nbsp;&nbsp;<span>Price: ₹'+ citem?.Special_price +'</span>';
          }
          ele = ele + '</div></a>';
      });

      ele = ele + '</div></div>';
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
        <div class="items">Loading...</div>
      </div>
    </div>
  </div>
</div>

<?php include 'footer.php'; ?>

<script type="text/javascript" src="js/main.js"></script>
</body>
</html>
