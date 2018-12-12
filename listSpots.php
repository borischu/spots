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
  <script src="./js/validate.js"></script>
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

<?php
  include 'connectDB.php';
  $qry = "SELECT spot, count(username), avg(rating) FROM $table GROUP BY spot ORDER BY avg(rating) DESC";
  $result = mysqli_query($connect, $qry);
  $str = '<table id="reviewTable" class="table table-hover text-centered"><tr><th>Spot</th><th>Total Reviewers</th><th>Average Ratings</th></tr>';
  while ($row = $result->fetch_row()) {
    $href = str_replace(' ', '%20', $row[0]);
    $str = $str."<tr><td><a href=\"./spot.php?spot=".$href."\">".$row[0]."</a></td><td>".$row[1]."</td><td>".$row[2]."</td></tr>"; 
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
      </table>
      </div>
BOTTOM;
    mysqli_close($connect);
?>
</div>
<br>
<div id="footer">
    <p> &copy; Atul Nayak, Boris Chu 2018 </p>
</div>
</body>
<br/>
</html>

