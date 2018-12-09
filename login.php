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
        <a class="nav-link" href="home.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="about_us.php">About Us</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="contact.php">Contact Us</a>
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
            <img src="./img/0.jpeg" alt="boris pic" style="width:35px">
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

  <form id = "regForm" method = "post" action = "setLoginCookie.php">
    <h2>Spots User Login</h2>
    <br>
    <table border = "0">
      <tr>
        <td> Username </td>
        <td> <input type = "username" name = "username" id="username"/></td>
      </tr>
      <tr>
        <td> Password </td>
        <td> <input type = "password" name = "password" id="password"/></td>
      </tr>
      <tr>
        <td><br> <input type = "submit" value = "Login" /></td>
        <td><br> <input type = "reset" value = "Clear" /></td>
      </tr>

    </table>
  </form>

</div>
</body>
<script>
  var spots = ["Billards", "Cain and Abels", "CPE Computer Lab", "Engineering Education and Research Center", "EERC Grad", "J2 Dining Hall", "Jester City Limits", "Jester Central Hall", "OXE", "Union Underground", "Welch Hall"];
  autocomplete(document.getElementById("searchSpots"), spots);
</script>
</html>
