function validForm () {
      var form = document.getElementById("regForm");
      var username = document.getElementById("username");
      var password = document.getElementById("password");
      var password2 = document.getElementById("password2");
      var user = /^([a-z]|[A-Z])([a-z]|[A-Z]|[0-9]){5,9}$/;
      var pass = /^([a-z]|[A-Z]|[0-9]){6,10}$/;
      var passnum = /(.*[0-9].*)/;
      var passlow = /(.*[a-z].*)/;
      var passupper = /(.*[A-Z].*)/;
      
      if(!username.value.match(user)) {
        alert("Invalid Input: Username");
        return false;
      }
    
      if(password.value != password2.value) {
        alert("Invalid Input: Passwords must match");
        return false;
      }

      if(!password.value.match(pass)) {
        alert("Invalid Input: Password");
        return false;
      }

      if(!password.value.match(passnum) || !password.value.match(passlow) || !password.value.match(passupper)) {
        alert("Invalid Input: Must Contain at least 1 lowercase letter, uppercase letter, and digit");
        return false;
      }

      alert("User Registration Successful!")
      return true;

    }
