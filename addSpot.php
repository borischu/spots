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

  if (isset($_SESSION["username"])) {
    include 'connectDB.php';
    $qry = "SELECT DISTINCT(spot) FROM $table";
    $result = mysqli_query($connect, $qry);

    while ($row = $result->fetch_row()) {
      $spotList = $spotList."<option>".$row[0]."</option>";
    }

    $script = $_SERVER['PHP_SELF'];
    if (isset($_GET["spot"])) {
      $spot = str_replace('$20', ' ', $_GET["spot"]);
      print <<<TOP
      <form id = "regForm" method = "post" action = "$script" onsubmit = "return spotForm();">
        <h2>Add a Study Spot!</h2>
        <br>
        <div class="form-group">
          <label for="spot">Study Spot:</label>
          <input type="text" class="form-control" id="spot" name="spot" value="$spot" data-list="spotList">
          <datalist id="spotList">
TOP;
      print($spotList);
      print <<<BOTTOM
        </datalist>
        </div>
        <div class="form-group">
          <label for="location">Location:</label>
          <input type="link" class="form-control" id="location" name="location" placeholder="cs.utexas.edu">
        </div>
        <div class="form-group">
          <label for="image">Link to Image:</label>
          <input type="link" class="form-control" id="image" name="image" placeholder="https://www.aiaaustin.org/sites/default/files/styles/story_image/public/useruploads/1/4/dell_atrium_620x390_smaller.jpeg">
        </div>
        <div class="form-group">
          <label for="rating">Overall Rating: (1-10)</label>
          <input type="number" class="form-control" id="rating" name="rating" placeholder="10">
        </div>
        <div class="form-group">
          <label for="review">Comments:</label>
          <textarea class="form-control" rows="5" id="review" placeholder="Write your review here!"></textarea>
        </div>
        <div class="form-group">
          <input type="submit" value="Submit" name="submit">
          <input type = "reset" value = "Clear" />
        </div>
      </form>
BOTTOM;
    } else {
      print <<<TOP
      <form id = "regForm" method = "post" action = "$script" onsubmit = "return spotForm();">
        <h2>Add a Study Spot!</h2>
        <br>
        <div class="form-group">
          <label for="spot">Study Spot:</label>
          <input type="text" class="form-control" id="spot" name="spot" placeholder="GDC Atrium" list="spotList">
          <datalist id="spotList">
TOP;
      print($spotList);
      print <<<BOTTOM
        </datalist>
        </div>
        <div class="form-group">
          <label for="location">Location:</label>
          <input type="link" class="form-control" id="location" name="location" placeholder="cs.utexas.edu">
        </div>
        <div class="form-group">
          <label for="image">Link to Image:</label>
          <input class="form-control" id="image" name="image" placeholder="https://www.aiaaustin.org/sites/default/files/styles/story_image/public/useruploads/1/4/dell_atrium_620x390_smaller.jpeg">
        </div>
        <div class="form-group">
          <label for="rating">Overall Rating: (1-10)</label>
          <input type="number" class="form-control" id="rating" name="rating" placeholder="10">
        </div>
        <div class="form-group">
          <label for="review">Comments:</label>
          <textarea type="text" class="form-control" rows="5" id="review" name="review" placeholder="Write your review here!"></textarea>
        </div>
        <div class="form-group">
          <input type="submit" value="Submit" name="submit">
          <input type = "reset" value = "Clear" />
        </div>
      </form>
BOTTOM;
    }

    if (isset($_POST["submit"])) {

      extract($_POST);
      $table = "spots";
      $username = $_SESSION["username"];
      $spot = $_POST["spot"];
      $location = $_POST["location"];
      $image = $_POST["image"];
      $rating = $_POST["rating"];
      $review = $_POST["review"];
      $time = time(); // time post request was made 

      $stmt = mysqli_prepare ($connect, "INSERT INTO $table VALUES (?, ?, ?, ?, ?, ?, ?)");
      mysqli_stmt_bind_param ($stmt, 'ssssisi', $username, $spot, $location, $image, $rating, $review, $time);
      mysqli_stmt_execute($stmt);
      if(mysqli_affected_rows($connect) == 0 || mysqli_affected_rows($connect) == -1) {
        echo '<script>';
        echo 'alert("There is a problem. Try again later.")';
        echo '</script>';
      }
      else {
        echo '<script>';
        echo 'alert("Added review! Thank you!");';
        echo "window.location.href = 'spot.php?spot=".$spot."';";
        echo '</script>';
      }
      mysqli_stmt_close($stmt);
      // Close connection to the database
      mysqli_close($connect);
    }
  } else {
  print <<<NOTLOGGEDIN
  <div class="container-fluid">
    <div id="contact_us">
      <div class="row">
        <div class="col-sm-12 align-self-center">
          <div class="spotTitle">
            Log in to review a Spot for other people to see!
          </div>
        </div>
      </div>
    </div>
  </div>
NOTLOGGEDIN;
  }

?>
</div>
<br><br><br>
<div id="footer">
  <p> &copy; Atul Nayak, Boris Chu 2018 </p>
</div>
</body>
</html>

