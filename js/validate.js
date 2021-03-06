function validForm () {
      var form = document.getElementById("regForm");
      var username = document.getElementById("username");
      var password = document.getElementById("password");
      var password2 = document.getElementById("password2");
      var user = /^([a-z]|[A-Z])([a-z]|[A-Z]|[0-9]){7,49}$/;
      var pass = /^([a-z]|[A-Z]|[0-9]){8,32}$/;
      var passnum = /(.*[0-9].*)/;
      var passlow = /(.*[a-z].*)/;
      var passupper = /(.*[A-Z].*)/;
      
      if(!username.value.match(user)) {
        alert("The username does not follow the guidelines.");
        return false;
      }
    
      if(password.value != password2.value) {
        alert("Invalid Input: Passwords must match");
        return false;
      }

      if(!password.value.match(pass)) {
        alert("The password does not follow the guidelines.");
        return false;
      }

      if(!password.value.match(passnum) || !password.value.match(passlow) || !password.value.match(passupper)) {
        alert("Invalid Input: Must Contain at least 1 lowercase letter, uppercase letter, and digit");
        return false;
      }

      return true;
}

function spotForm() {
      var form = document.getElementById("regForm");
      var spot = document.getElementById("spot");
      var location = document.getElementById("location");
      var image = document.getElementById("image");
      var rating = document.getElementById("rating");
      var review = document.getElementById("review");
      var url = /^(http:\/\/www\.|https:\/\/www\.|http:\/\/|https:\/\/)?[a-z0-9]+([\-\.]{1}[a-z0-9]+)*\.[a-z]{2,5}(:[0-9]{1,5})?(\/.*)?$/;
      var rate = /^([1-9]|10)$/;
      var reviewLength = /^(.|\n){1,500}$/;

      if(!spot.value) {
        alert("Must enter a spot.");
        return false;
      }

      if(!rating.value) {
        alert("Must enter a rating.");
        return false;
      }

      if(!rating.value.match(rate)){
        alert("Rating must be from 1 to 10.");
        return false;
      }

      if(location.value && !location.value.match(url)) {
        alert("Must enter a link to a website.");
        return false;
      }

      if(image.value && !image.value.match(url)) {
        alert("Must enter a link for image.");
        return false;
      }

      if(review.value && !review.value.match(reviewLength)) {
        alert("Review must be under 500 characters");
        return false;
      }

      return true;

}

var xhr; 
if (window.ActiveXObject) { 
  xhr = new ActiveXObject ("Microsoft.XMLHTTP"); 
} 
else if (window.XMLHttpRequest) { 
  xhr = new XMLHttpRequest (); 
} 

function callServer() { 
  // Get username from web form 
  var username = document.getElementById("username").value; 

  // Only make the server call if there is data 
  if (username == null || username == "") {return;}

  // Build the URL to connect to 
  var url = "./checkUser.php"; 

  // Create the name-value pairs that will be sent as data 
  var params = "username="+username;

  // Open a connection to the server 
  xhr.open ("POST", url, true); 

  // Create the proper headers to send with the request
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

  // Setup a function for the server to run when it is done 
  xhr.onreadystatechange = updatePage; 

  // Send the request 
  xhr.send(params); 
} 

function updatePage() { 
    if (xhr.readyState == 4) { 
        if (xhr.status == 200) { 
            var response = xhr.responseText;
            if(response.trim() == "userTaken") {
              window.alert("This username has already been taken.");
            }
        }
    }
} 