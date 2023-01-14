
  // Password confirmation
  var pass_check = function() {
    if (document.getElementById('password').value ==
      document.getElementById('confirm_password').value) {
      document.getElementById('password_warning').style.color = 'green';
      document.getElementById('password_warning').innerHTML = 'matching';

    }else {
      document.getElementById('password_warning').style.color = 'red';
      document.getElementById('password_warning').innerHTML = 'not matching';
    }
  }
  
    // Date check
    var date_check = function() {
        if (document.getElementById('start_date').value >=
          document.getElementById('end_date').value) {
          document.getElementById('password_warning').style.color = 'red';
          document.getElementById('password_warning').innerHTML = 'Both dates cannot be the same';
    
        }else {
          document.getElementById('password_warning').style.color = 'green';
          document.getElementById('password_warning').innerHTML = 'Allowed';
        }
      }

    // Submit button validation
    function enableBtn() {
      if (document.getElementById('password').value ==
        document.getElementById('confirm_password').value && document.getElementById('password').value != null) {
        document.getElementById('btn').disabled = false;
      }else {
        document.getElementById('btn').disabled = true;
      }
    }