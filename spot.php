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
  <script type ="text/javascript" src="./js/validate.js"></script>
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

<?php
  $_SESSION["spot"] = $_GET["spot"];
  include 'connectDB.php';
  $spot = str_replace('$20', ' ', $_SESSION["spot"]);
  $qry = "SELECT * FROM $table WHERE spot = '$spot' ORDER BY time DESC";
  $result = mysqli_query($connect, $qry);
  while ($row = $result->fetch_row()) {
    $spotBlock = $spotBlock.
    "<div id=\"spotsReview\" class=\"spotImage\">
      <div class=\"row\">
        <div class=\"col-sm-12\">
          <h2>Review by <b>".$row[0]."</b></h2>
        </div>";
    // conditionals based on if image, location or reviews are provided
    if ($row[3]) {
      $spotBlock = $spotBlock.
      "<div class=\"embed-responsive\">
        <img src=".$row[3]." type=\"image\">
      </div>";
    }
    if ($row[2]) {
      $spotBlock = $spotBlock.
      "<div id=\"location\" class=\"col-sm-12\">
          <a target=\"blank\" href=".$row[2].">Link to Location</a>
      </div>";
    }
    $spotBlock = $spotBlock.
    "<div id=\"rating\" class=\"col-sm-12\">
      <p>Rating: ".$row[4]."</p>
    </div>";
    if($row[5]) {
      $spotBlock = $spotBlock.
      "<div id=\"description\" class=\"col-sm-12\">
        <p>".$row[5]."</p>
      </div>";
    }
    $spotBlock = $spotBlock."</div></div>";
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
  print <<<BOTTOM
    </div>
BOTTOM;
?>
</div>
<?php
  print <<<ADD
    <br>
    <input type="add" value="Add Review" name="addReview" onclick="location.href='./addSpot.php?spot=$spot'">
ADD;
?>
</body>
<br><br>
<div id="footer">
  <p> &copy; Atul Nayak, Boris Chu 2018 </p>
</div>
</html>

