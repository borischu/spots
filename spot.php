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
  <script type ="text/javascript" src="./js/acct_validate.js"></script>
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
  if(isset($_COOKIE["loggedIn"])) {
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
      <a role="button" class="btn btn-primary" href="./create_acct.php">Register</a>
      <a role="button" class="btn btn-outline-primary" href="./login.php">Login</a>
    </div>
LOGGEDOUT;
  }
?>
</nav>

<div class="container-fluid">

<?php
  $_SESSION["spot"] = $_GET["spot"];
  if (isset($_SESSION["username"]) && isset($_SESSION["spot"])) {

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

    $spot = str_replace('$20', ' ', $_SESSION["spot"]);
    $table = "spots";
    $qry = "SELECT * FROM $table WHERE spot = '$spot'";
    $result = mysqli_query($connect, $qry);
    while ($row = $result->fetch_row()) {
      $spotBlock = $spotBlock.
      "<div id=\"spotsReview\" class=\"spotImage\">
        <div class=\"row\">
          <div class=\"col-sm-12\">
            <h2>Review by <b>".$row['0']."</b></h2>
          </div>
          <div class=\"embed-responsive\">
            <img src=".$row['3']." type=\"image\">
          </div>
          <div id=\"rating\" class=\"col-sm-12\">
            <p>Rating: ".$row['4']."</p>
          </div>
          <br>
          <div id=\"description\" class=\"col-sm-12\">
            <p>".$row['5']."</p>
          </div>
        </div>
      </div>"; 
    } 
    print <<<TOP
      <div id="viewSpot" class="row">
        <div class="col-sm-12">
          <h1 class="spotTitle">$spot</h1>
        </div>
      </div>
TOP;
    print($spotBlock);
    mysqli_close($connect);
  }
?>
</div>
</body>
<script>
  var spots = ["Billards", "Cain and Abels", "CPE Computer Lab", "Engineering Education and Research Center", "EERC Grad", "J2 Dining Hall", "Jester City Limits", "Jester Central Hall", "OXE", "Union Underground", "Welch Hall"];
  autocomplete(document.getElementById("searchSpots"), spots);
</script>
</html>
