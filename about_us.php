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

  <div id="about_us" class="row">
    <div>
      <h1>About Us</h1>
    </div>
    <br /><br /><br />
    <div class="row">
      <div class="col-sm-5">
        <div class="profile_images">
          <img class="img-responsive" src="https://fall-2018.cs.utexas.edu/cs329e-mitra/asn627/hwk1/Pic_Of_Me.jpg" alt="atul"/>
        </div>
      </div>
      <div id="description" class="col-sm-6">
        <h2>Atul Nayak</h2>
        <br />
        <p>Atul is a fourth-year Chemical Engineering major. He has worked at Capital One as both a business analyst and a data analyst. He also likes dogs. </p>
      </div>
    </div>
    <br />
    <div class="row">
      <div class="col-sm-5">
        <div class="profile_images">
          <img class="img-responsive" src="https://fall-2018.cs.utexas.edu/cs329e-mitra/borischu/hwk1/boris.jpg" alt="boris"/>
        </div>
      </div>
      <div id="description" class="col-sm-6">
        <h2>Boris Chu</h2>
        <br />
        <p>Boris is also a fourth-year Chemical Engineering major. He has worked at Samsung and Squarecap. He is also very interested in investing and even has his own hedge fund. </p>
      </div>
    </div>
  </div>

  <br>
  <div id="footer">
    <p> &copy; Atul Nayak, Boris Chu 2018 </p>
  </div>
</div>
</body>
</html>

