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
    $qry = "SELECT spot, count(username), avg(rating) FROM $table GROUP BY spot";
    $result = mysqli_query($connect, $qry);
    $str = '<table id="reviewTable" class="table table-hover text-centered"><tr><th>Spot</th><th>Total Reviewers</th><th>Average Ratings</th></tr>';
    while ($row = $result->fetch_row()) {
      $str = $str."<tr><td><a href=\"./spot.php?spot=".$row[0]."\">".$row[0]."</a></td><td>".$row[1]."</td><td>".$row[2]."</td></tr>"; 
    } 
    print <<<TOP
      <div id="viewSpot" class="row">
        <div class="col-sm-12">
          <h1 class="spotTitle">List of Spots</h1>
        </div>
      </div>
      <div id="spotsReview">
TOP;
    print($str);
    print <<<BOTTOM
      </div>
BOTTOM;
    mysqli_close($connect);
  /*
  else{
    print <<<NOTLOGGEDIN
    <div class="container-fluid">
      <div id="contact_us">
        <div class="row">
          <div class="col-sm-12 align-self-center">
            <div class="spotTitle">
              Log in to see your list of Spots!
            </div>
          </div>
        </div>
      </div>
    </div>
NOTLOGGEDIN;
  }*/
?>
</div>
</body>
<script>
  var spots = ["Billards", "Cain and Abels", "CPE Computer Lab", "Engineering Education and Research Center", "EERC Grad", "J2 Dining Hall", "Jester City Limits", "Jester Central Hall", "OXE", "Union Underground", "Welch Hall"];
  autocomplete(document.getElementById("searchSpots"), spots);
</script>
</html>

