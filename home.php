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
  <script type ="text/javascript" src="./js/search.js"></script>
  <link rel="stylesheet" type="text/css" href="./css/home.css">
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
        <a class="nav-link" href="addSpot.php">Add a Spot!</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="listSpots.php">List of Spots</a>
      </li>
    </ul>
  </div>

  <form autocomplete="off" class="form-inline my-2 my-lg-0">
      <div class="autocomplete">
        <input id="searchSpots" class="form-control mr-sm-2" type="text" placeholder="Search">
      </div>
  </form>

<?php
  if ($_COOKIE["loggedIn"]) {
      print <<<LOGGEDIN
      <div class="dropdown">
          <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
              <img src="./img/0.jpg" alt="boris pic" style="width:35px">
          </button>
          <ul class="dropdown-menu dropdown-menu-right">
            <li><a class="dropdown-item" href="blank.html">Profile</a></li>
            <li><a class="dropdown-item" href="blank.html">Settings</a></li>
            <li><a class="dropdown-item" href="logOut.php">Logout</a></li>
          </ul>
      </div>
LOGGEDIN;
  } else {
      print <<<LOGGEDOUT
      <div class="btn-group">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="./create_acct.php">Register</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./login.php">Login</a>
          </li>
        </ul>
      </div>
LOGGEDOUT;
  }
?>

</nav>

<div class="container-fluid">
  <div id="header" class="row">
    <p class="col-sm-12"> <strong>Spots</strong> is a website that streamlines the process of finding an optimal study spot that best fits with your preferences. <br /> Check out some of your favorite spots down below! </p>
  </div>

  <div id="featured" class="row">
    <div class="row">
      <div class="col-sm-12">
        <h1> Featured </h1>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-6">
        <div class="embed-responsive embed-responsive-16by9">
          <video controls>
            <source src="./img/featured.mp4" type="video/mp4">
          </video>
        </div>
      </div>
      <div id="description" class="col-sm-6">
        <h2><a href="spot.php?spot=GDC Lobby">GDC Lobby</a></h2>
        <p>The Gates Dell Complex is one of the newest buildings on campus. It is the home of the university's computer science department. Be one of the first people to rate this study spot on campus! </p>
      </div>
    </div>
  </div>

  <!-- popular -->
  <div id="popular">
    <div>
      <h2> Popular </h2>
    </div>
    <div class="container mt-3">
      <div id="popularCarousel" class="carousel slide" data-ride="carousel" data-interval="false">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="row">
              <div class="col-sm-3">
                <a href="blank.html"><img src="./img/union_underground.jpg" alt="Union Underground"></a>
              </div>
              <div class="col-sm-3">
                <a href="blank.html"><img src="./img/jester_central.jpg" alt="Jester Central"></a>
              </div>
              <div class="col-sm-3">
                <a href="blank.html"><img src="./img/j2.jpg" alt="Jester 2nd Floor"></a>
              </div>
              <div class="col-sm-3">
                <a href="blank.html"><img src="./img/jcl.jpg" alt="PCL Private Rooms"></a>
              </div>
            </div>
          </div>
          <div class="carousel-item ">
            <div class="row">
              <div class="col-sm-3">
                <a href="blank.html"><img src="./img/eerc.jpg" alt="EERC Ground Floor"></a>
              </div>
              <div class="col-sm-3">
                <a href="blank.html"><img src="./img/eerc_grad.jpg" alt="EERC Grad Lounge"></a>
              </div>
              <div class="col-sm-3">
                <a href="blank.html"><img src="./img/cain_abels.jpg" alt="Cain & Abels"></a>
              </div>
              <div class="col-sm-3">
                <a href="blank.html"><img src="./img/oxe.jpg" alt="OXE Lounge"></a>
              </div>
            </div>
          </div>
          <div class="carousel-item ">
            <div class="row">
              <div class="col-sm-3">
                <a href="blank.html"><img src="./img/oxe.jpg" alt="OXE Lounge"></a>
              </div>
              <div class="col-sm-3">
                <a href="blank.html"><img src="./img/billiards.jpg" alt="Gregory Gym Billiards"></a>
              </div>
              <div class="col-sm-3">
                <a href="blank.html"><img src="./img/welch.jpg" alt="Welch Ground Floor"></a>
              </div>
              <div class="col-sm-3">
                <a href="blank.html"><img src="./img/cpe_computer.jpg" alt="CPE Computer Labs"></a>
              </div>
            </div>
          </div>
        </div>
        
        <!-- Left and right controls -->
        <a class="carousel-control-prev" href="#popularCarousel" data-slide="prev">
          <span class="carousel-control-prev-icon"></span>
        </a>
        <a class="carousel-control-next" href="#popularCarousel" data-slide="next">
          <span class="carousel-control-next-icon"></span>
        </a>
      </div>
    </div>
  </div>

  <!-- trending -->
  <div id="trending">
    <div>
      <h2> Trending </h2>
    </div>
    <div class="container mt-3">
      <div id="trendingCarousel" class="carousel slide" data-ride="carousel" data-interval="false">
        <div class="carousel-inner">
          <div class="carousel-item ">
            <div class="row">
              <div class="col-sm-3">
                <a href="blank.html"><img src="./img/union_underground.jpg" alt="Union Underground"></a>
              </div>
              <div class="col-sm-3">
                <a href="blank.html"><img src="./img/jester_central.jpg" alt="Jester Central"></a>
              </div>
              <div class="col-sm-3">
                <a href="blank.html"><img src="./img/j2.jpg" alt="Jester 2nd Floor"></a>
              </div>
              <div class="col-sm-3">
                <a href="blank.html"><img src="./img/jcl.jpg" alt="PCL Private Rooms"></a>
              </div>
            </div>
          </div>
          <div class="carousel-item active">
            <div class="row">
              <div class="col-sm-3">
                <a href="blank.html"><img src="./img/eerc.jpg" alt="EERC Ground Floor"></a>
              </div>
              <div class="col-sm-3">
                <a href="blank.html"><img src="./img/eerc_grad.jpg" alt="EERC Grad Lounge"></a>
              </div>
              <div class="col-sm-3">
                <a href="blank.html"><img src="./img/cain_abels.jpg" alt="Cain & Abels"></a>
              </div>
              <div class="col-sm-3">
                <a href="blank.html"><img src="./img/oxe.jpg" alt="OXE Lounge"></a>
              </div>
            </div>
          </div>
          <div class="carousel-item ">
            <div class="row">
              <div class="col-sm-3">
                <a href="blank.html"><img src="./img/oxe.jpg" alt="OXE Lounge"></a>
              </div>
              <div class="col-sm-3">
                <a href="blank.html"><img src="./img/billiards.jpg" alt="Gregory Gym Billiards"></a>
              </div>
              <div class="col-sm-3">
                <a href="blank.html"><img src="./img/welch.jpg" alt="Welch Ground Floor"></a>
              </div>
              <div class="col-sm-3">
                <a href="blank.html"><img src="./img/cpe_computer.jpg" alt="CPE Computer Labs"></a>
              </div>
            </div>
          </div>
        </div>
                
        
        <!-- Left and right controls -->
        <a class="carousel-control-prev" href="#trendingCarousel" data-slide="prev">
          <span class="carousel-control-prev-icon"></span>
        </a>
        <a class="carousel-control-next" href="#trendingCarousel" data-slide="next">
          <span class="carousel-control-next-icon"></span>
        </a>
      </div>
    </div>
  </div>

  <!-- recently viewed-->
  <div id="recent">
    <div>
      <h2> Recently Viewed </h2>
    </div>
    <div class="container mt-3">
      <div id="recentCarousel" class="carousel slide" data-ride="carousel" data-interval="false">
        <div class="carousel-inner">
          <div class="carousel-item ">
            <div class="row">
              <div class="col-sm-3">
                <a href="blank.html"><img src="./img/union_underground.jpg" alt="Union Underground"></a>
              </div>
              <div class="col-sm-3">
                <a href="blank.html"><img src="./img/jester_central.jpg" alt="Jester Central"></a>
              </div>
              <div class="col-sm-3">
                <a href="blank.html"><img src="./img/j2.jpg" alt="Jester 2nd Floor"></a>
              </div>
              <div class="col-sm-3">
                <a href="blank.html"><img src="./img/jcl.jpg" alt="PCL Private Rooms"></a>
              </div>
            </div>
          </div>
          <div class="carousel-item ">
            <div class="row">
              <div class="col-sm-3">
                <a href="blank.html"><img src="./img/eerc.jpg" alt="EERC Ground Floor"></a>
              </div>
              <div class="col-sm-3">
                <a href="blank.html"><img src="./img/eerc_grad.jpg" alt="EERC Grad Lounge"></a>
              </div>
              <div class="col-sm-3">
                <a href="blank.html"><img src="./img/cain_abels.jpg" alt="Cain & Abels"></a>
              </div>
              <div class="col-sm-3">
                <a href="blank.html"><img src="./img/oxe.jpg" alt="OXE Lounge"></a>
              </div>
            </div>
          </div>
          <div class="carousel-item active">
            <div class="row">
              <div class="col-sm-3">
                <a href="blank.html"><img src="./img/oxe.jpg" alt="OXE Lounge"></a>
              </div>
              <div class="col-sm-3">
                <a href="blank.html"><img src="./img/billiards.jpg" alt="Gregory Gym Billiards"></a>
              </div>
              <div class="col-sm-3">
                <a href="blank.html"><img src="./img/welch.jpg" alt="Welch Ground Floor"></a>
              </div>
              <div class="col-sm-3">
                <a href="blank.html"><img src="./img/cpe_computer.jpg" alt="CPE Computer Labs"></a>
              </div>
            </div>
          </div>

          <!-- Left and right controls -->
          <a class="carousel-control-prev" href="#recentCarousel" data-slide="prev">
            <span class="carousel-control-prev-icon"></span>
          </a>
          <a class="carousel-control-next" href="#recentCarousel" data-slide="next">
            <span class="carousel-control-next-icon"></span>
          </a>
        </div>
      </div>
    </div>  
  </div>
  
  <br />
  <div id="footer">
    <p> &copy; Atul Nayak, Boris Chu 2018 </p>
  </div>

</div>
</body>
<script>
  var spots = ["Billards", "Cain and Abels", "CPE Computer Lab", "Engineering Education and Research Center", "EERC Grad", "J2 Dining Hall", "Jester City Limits", "Jester Central Hall", "OXE", "Union Underground", "Welch Hall"];
  autocomplete(document.getElementById("searchSpots"), spots);
</script>
</html>