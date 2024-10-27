<?php
  function active($currect_page){
    $url_array =  explode('/', $_SERVER['REQUEST_URI']) ;
    $url = end($url_array);  
    if($currect_page == $url){
        echo 'active';
    } 
  }
?>
<nav class="navbar navbar-default navbar-fixed-top" id="home">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="index.php"><h1>Best Veg Deals</h1></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li class="<?php active('index.php');?>"><a href="index.php">HOME</a></li>
        <li class="<?php active('viewall.php');?>"><a href="viewall.php">VIEW ALL</a></li>
        <li class="<?php active('compare.php');?>"><a href="compare.php">COMPARE</a></li>
        <?php
          if(!isset($_SESSION['mapuseremail'])) {
        ?>
            <li style="margin-left:50px"><button onclick="document.location.href='login.php'">LOGIN</button></li>
            <li style="margin-left:20px"><button onclick="document.location.href='register.php'">REGISTER</button></li>
        <?php } else { ?>
          <li style="margin-left:50px"><button onclick="document.location.href='account.php'">HI, <?php if(isset($_SESSION['mapusername'])) echo $_SESSION['mapusername']; ?></button></li>
        <?php } ?>
      </ul>
    </div>
  </div>
</nav>