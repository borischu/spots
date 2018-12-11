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
  if (isset($_SESSION["username"])) {
    $script = $_SERVER['PHP_SELF'];
    print <<<SPOTSFORM
    <form id = "regForm" method = "post" action = "$script">
      <h2>Add a Study Spot!</h2>
      <br>
      <div class="form-group">
        <label for="spot">Study Spot:</label>
        <input type="text" class="form-control" id="spot" name="spot">
      </div>
      <div class="form-group">
        <label for="location">Location:</label>
        <input type="text" class="form-control" id="location" name="location">
      </div>
      <div class="form-group">
        <label for="image">Link to Image:</label>
        <input type="link" class="form-control" id="image" name="image">
      </div>
      <div class="form-group">
        <label for="rating">Overall Rating:</label>
        <input type="number" class="form-control" id="rating" name="rating">
      </div>
      <div class="form-group">
        <label for="comment">Comments:</label>
        <textarea class="form-control" rows="5" id="comment"></textarea>
      </div>
      <div class="form-group">
        <input type="submit" value="Submit" name="submit">
        <input type = "reset" value = "Clear" />
      </div>
    </form>
SPOTSFORM;

    if(isset($_POST["submit"])) {
      
      $host = "fall-2018.cs.utexas.edu";
      // $host = "localhost";
      $user = "cs329e_mitra_borischu";
      $pwd = "Part&Snake=freer";
      $dbs = "cs329e_mitra_borischu";
      $port = "3306";

      $connect = mysqli_connect ($host, $user, $pwd, $dbs, $port);

      if (empty($connect)) {
        die("mysqli_connect failed: " . mysqli_connect_error());
      }

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
      print "One of the inputs was not the correct data type. ID must be an 4 number integer and GPA must be a 2 decimal float. LAST, FIRST, and MAJOR must all be strings.";
      }
      else {
        print "The insertion was successful!<br/><br />\n";
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
</body>
<script>
  var spots = ["Billards", "Cain and Abels", "CPE Computer Lab", "Engineering Education and Research Center", "EERC Grad", "J2 Dining Hall", "Jester City Limits", "Jester Central Hall", "OXE", "Union Underground", "Welch Hall"];
  autocomplete(document.getElementById("searchSpots"), spots);
</script>
</html>

