<?php
  session_start();
?>
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
        <a class="nav-link" href="listSpots.php">List of Spots</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="addSpot.php">Review a Spot!</a>
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
    $str = "<div class=\"dropdown\">
          <button type=\"button\" class=\"btn btn-primary dropdown-toggle\" data-toggle=\"dropdown\">
              <img src=\"./img/0.jpg\" alt=\"profile pic\" style=\"width:35px\">
          </button>
          <ul class=\"dropdown-menu dropdown-menu-right\">
            <li style=\"text-align:center;\">Logged in as\n<b>"; 
    $str = $str.$_SESSION["username"]."</b></li>
            <li><a class=\"dropdown-item\" href=\"logOut.php\" style=\"text-align:center;\">Logout</a></li>
          </ul>
      </div>";
    print($str);
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
        <h2><a class="featuredTitle" href="spot.php?spot=GDC Atrium">GDC Atrium</a></h2>
        <p>The Gates Dell Complex is one of the newest buildings on campus. It is the home of the university's computer science department. Be one of the first people to rate this study spot on campus! </p>
      </div>
    </div>
  </div>

<?php
  $host = "fall-2018.cs.utexas.edu";
  // $host = "localhost";
  $user = "cs329e_mitra_borischu";
  $pwd = "Part&Snake=freer";
  $dbs = "cs329e_mitra_borischu";
  $port = "3306";

  $connect = mysqli_connect($host, $user, $pwd, $dbs, $port);

  if (empty($connect)) {
    die("mysqli_connect failed: " . mysqli_connect_error());
  }

  $table = "spots";

  // POPULAR 
  $qry = "SELECT spot, max(image), avg(rating) FROM $table GROUP BY spot ORDER BY avg(rating) DESC LIMIT 12";
  $result = mysqli_query($connect, $qry);

  $popular = true;
  $count4 = 1;
  while ($row = $result->fetch_row()) {
    if ($popular == true && $count4 == 1) {
      $popularStr = $popularStr."<div class=\"carousel-item active\">
                  <div class=\"row\">"; 
      $popular = false;
    }
    else if ($popular == false && $count4 == 5 or $count4 == 9) {
      $popularStr = $popularStr."<div class=\"carousel-item\">
                   <div class=\"row\">"; 
    }
    if ($row[1] == null) {
      $popularStr = $popularStr."<div class=\"col-sm-3\">
                    <a href=\"spot.php?spot=".$row[0]."\"><img src=\"./img/nothing.jpeg\"></a>
                    </div>";
    } else {
      $popularStr = $popularStr."<div class=\"col-sm-3\">
                    <a href=\"spot.php?spot=".$row[0]."\"><img src=\"".$row[1]."\"></a>
                    </div>";
    }
    if ($count4 == 4 or $count4 == 8 or $count == 12) {
      $popularStr = $popularStr."</div></div>";
    }
    $count4 += 1; 
  } 
  print <<<TOP
    <!-- popular -->
    <div id="popular">
      <div>
        <h2> Popular </h2>
      </div>
      <div class="container mt-3">
      <div id="popularCarousel" class="carousel slide" data-ride="carousel" data-interval="false">
      <div class="carousel-inner">
TOP;
  print($popularStr);
  print <<<BOTTOM
    </div></div></div>
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
BOTTOM;

  // TRENDING 
  $qry = "SELECT spot, max(image) FROM $table GROUP BY spot ORDER BY count(spot) DESC LIMIT 12";
  $result = mysqli_query($connect, $qry);

  $trending = true;
  $count4 = 1;
  while ($row = $result->fetch_row()) {
    if ($trending == true && $count4 == 1) {
      $trendingStr = $trendingStr."<div class=\"carousel-item active\">
                  <div class=\"row\">"; 
      $trending = false;
    }
    else if ($trending == false && $count4 == 5 or $count4 == 9) {
      $trendingStr = $trendingStr."<div class=\"carousel-item\">
                   <div class=\"row\">"; 
    } 
    if ($row[1] == null) {
      $trendingStr = $trendingStr."<div class=\"col-sm-3\">
                    <a href=\"spot.php?spot=".$row[0]."\"><img src=\"./img/nothing.jpeg\"></a>
                    </div>";
    } else {
      $trendingStr = $trendingStr."<div class=\"col-sm-3\">
                    <a href=\"spot.php?spot=".$row[0]."\"><img src=\"".$row[1]."\"></a>
                    </div>";
    }
    if ($count4 == 4 or $count4 == 8 or $count == 12) {
      $trendingStr = $trendingStr."</div></div>";
    }
    $count4 += 1; 
  } 
  print <<<TOP
    <!-- trending -->
    <div id="trending">
      <div>
        <h2> Trending </h2>
      </div>
      <div class="container mt-3">
      <div id="trendingCarousel" class="carousel slide" data-ride="carousel" data-interval="false">
      <div class="carousel-inner">
TOP;
  print($trendingStr);
  print <<<BOTTOM
    </div></div></div>
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
BOTTOM;

  // RECENTLY ADDED 
  $qry = "SELECT spot, max(image), max(time) FROM $table GROUP BY spot ORDER BY max(time) DESC LIMIT 12";
  $result = mysqli_query($connect, $qry);

  $recent = true;
  $count4 = 1;
  while ($row = $result->fetch_row()) {
    if ($recent == true && $count4 == 1) {
      $recentStr = $recentStr."<div class=\"carousel-item active\">
                  <div class=\"row\">"; 
      $recent = false;
    }
    else if ($recent == false && $count4 == 5 or $count4 == 9) {
      $recentStr = $recentStr."<div class=\"carousel-item\">
                   <div class=\"row\">"; 
    } 
    if ($row[1] == null) {
      $recentStr = $recentStr."<div class=\"col-sm-3\">
                    <a href=\"spot.php?spot=".$row[0]."\"><img src=\"./img/nothing.jpeg\"></a>
                    </div>";
    } else {
      $recentStr = $recentStr."<div class=\"col-sm-3\">
                    <a href=\"spot.php?spot=".$row[0]."\"><img src=\"".$row[1]."\"></a>
                    </div>";
    }
    if ($count4 == 4 or $count4 == 8 or $count == 12) {
      $recentStr = $recentStr."</div></div>";
    }
    $count4 += 1; 
  } 
  print <<<TOP
    <!-- recent -->
    <div id="recent">
      <div>
        <h2> Recently Reviewed </h2>
      </div>
      <div class="container mt-3">
      <div id="recentCarousel" class="carousel slide" data-ride="carousel" data-interval="false">
      <div class="carousel-inner">
TOP;
  print($recentStr);
  print <<<BOTTOM
    </div></div></div>
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
BOTTOM;

  mysqli_close($connect);
?>
</div>
<br />
<div id="footer">
  <p> &copy; Atul Nayak, Boris Chu 2018 </p>
</div>
</body>
<script>
  var spots = ["Billards", "Cain and Abels", "CPE Computer Lab", "Engineering Education and Research Center", "EERC Grad", "J2 Dining Hall", "Jester City Limits", "Jester Central Hall", "OXE", "Union Underground", "Welch Hall"];
  autocomplete(document.getElementById("searchSpots"), spots);
</script>
</html>