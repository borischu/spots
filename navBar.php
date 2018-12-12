<?php
  include 'connectDB.php';
  $qry = "SELECT DISTINCT(spot), time FROM $table ORDER BY time DESC";
  $result = mysqli_query($connect, $qry);

  while ($row = $result->fetch_row()) {
    $spotList = $spotList."<option>".$row[0]."</option>";
  }

  print <<<TOP
  <form class="form-inline my-2 my-lg-0">
      <div class="autocomplete">
        <input class="form-control mr-sm-2 spotList" type="text" placeholder="Search" list="spotList" onchange="window.location.href='/spot.php?spot=' + this.value;">
        <datalist id="spotList">
TOP;
  print($spotList);
  print <<<BOTTOM
        </datalist> 
        </input>
      </div>
  </form>
BOTTOM;

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