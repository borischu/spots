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

  <form id = "regForm" method = "post" action = "signUp.php" onsubmit = "return validForm();" >
    <h2>Spots User Registration</h2>
    <p>
      Make an account to keep up with and access all your favorite spots!
    </p>
    <table>
     <tr>
        <td class="loginForm"><label for="username">Username: </label></td>
        <td class="loginForm"><input type="text" id="username" name="username" required onchange="callServer();"></td>
      </tr>
      <tr>
        <td class="loginForm"><label for="password">Password: </label></td>
        <td class="loginForm"><input type="password" id="password" name="password" required></td>
      </tr>
      <tr>
        <td class="loginForm"><label for="password2">Repeat Password: </label></td>
        <td class="loginForm"><input type="password" id="password2" name="password2" required></td>
      </tr>
      <tr>
        <td colspan="2" class="registerForm">
          <ul>
            <li>The user name must be between 8 and 50 characters long.</li>
            <li>The user name must contain only letters and digits.</li>
            <li>The user name cannot begin with a digit.</li>
            <li>The password and the repeat password must match.</li>
            <li>The password must be between 8 and 32 characters.</li>
            <li>The password must contain only letters and digits.</li>
            <li>The password must have at least one lower case letter, at least one upper case letter, and at least one digit. </li>
          </ul>
        </td>
      </tr>
      <tr>
        <td colspan="2" id="buttons" class="loginForm">
          <input type = "submit" value = "Register" />
          <input type = "reset" value = "Clear" />
        </td>
      </tr>
    </table>
  </form>

</div>
<br/>
<div id="footer">
    <p> &copy; Atul Nayak, Boris Chu 2018 </p>
</div>
</body>
</html>

