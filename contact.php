<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Spots: Find Your Perfect Study Experience</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  <link rel="icon" href="./img/logo2.png">
  <link rel="stylesheet" type="text/css" href="./css/styles.css">
</head>
<body>
  
<nav class="navbar navbar-expand-sm bg-dark navbar-dark sticky-top">
  <a class="navbar-brand" href="home.php">
    <img src="./img/logo2.png" alt="Logo" style="width:40px;">
    Spots
  </a>

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="about_us.php">About Us</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="contact.php">Contact Us</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="listSpots.php">List of Spots</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="addSpot.php">Review a Spot!</a>
      </li>
    </ul>
  </div>

<?php include 'navBar.php';?>
</nav>

<div class="container-fluid">

  <div id="contact_us" class="row">
    <div>
      <h1>Contact Us</h1>
    </div>
    <br /><br />
    
    <!--
    <div id="contact_info" class="row">
      <div class="col-sm-12"> <b>Daniel He:</b><br>
      3111 Tom Green St <br>
      Phone: 281-617-6396<br>
      Email: danielhe@utexas.edu
      </div>
    </div>

    <br />-->
    <div id="contact_info_atul" class="row">
      <div class="col-sm-12"> <b>Atul Nayak:</b><br>
      2300 Nueces Street <br>
      Phone: 281-394-2758<br>
      Email: <a href="mailto:a.nayak511@utexas.edu" target="_top">a.nayak511@utexas.edu</a>
      </div>
    </div>

    <br />
    <div id="contact_info_boris" class="row">
      <div class="col-sm-12"> <br><b>Boris Chu:</b><br>
      2822 Rio Grande St. <br>
      Phone: 832-605-4350<br>
      Email: <a href="mailto:boriskchu@utexas.edu" target="_top">boriskchu@utexas.edu</a>
      </div>
    </div>

    <br>
  </div>

  <br>
  <div id="footer">
    <p> &copy; Atul Nayak, Boris Chu 2018 </p>
  </div>
</div>
</body>
</html>

