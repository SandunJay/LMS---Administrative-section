// Date validation
var date_check = function() {
    if (document.getElementById('start_date').value !==
      document.getElementById('end_date').value) {
      document.getElementById('date_warning').style.color = 'green';
      document.getElementById('date_warning').innerHTML = 'Allowed';
    } else {
      document.getElementById('date_warning').style.color = 'red';
      document.getElementById('date_warning').innerHTML = 'Start date and end date cannot be the same';
    }
  }

