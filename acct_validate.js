function validForm () {
      var form = document.getElementById("regForm");
      var user = /^([a-z]|[A-Z])([a-z]|[A-Z]|[0-9]){5,9}$/;
      var pass = /^([a-z]|[A-Z]|[0-9]){6,10}$/;
      var passnum = /(.*[0-9].*)/;
      var passlow = /(.*[a-z].*)/;
      var passupper = /(.*[A-Z].*)/;
      
      if(!form.userName.value.match(user)) {
        alert("Invalid Input: Username");
        return false;
      }
    
      if(form.password.value != form.password2.value) {
        alert("Invalid Input: Passwords must match");
        return false;
      }

      if(!form.password.value.match(pass)) {
        alert("Invalid Input: Password");
        return false;
      }

      if(!form.password.value.match(passnum) || !form.password.value.match(passlow) || !form.password.value.match(passupper)) {
        alert("Invalid Input: Must Contain at least 1 lowercase letter, uppercase letter, and digit");
        return false;
      }

      alert("Passed Validation!")
      return true;

    }
