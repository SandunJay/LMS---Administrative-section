// Name confirmation
var username_check = function() {
  if (document.getElementById('userName').value ==
    document.getElementById('cfuserName').value)
    document.getElementById('username_warning').style.color = 'red';
    document.getElementById('username_warning').innerHTML = 'Cannot be the same';
}
// Email confirmaion
var email_check = function() {
  if (document.getElementById('email').value ==
    document.getElementById('cfemail').value) {
    document.getElementById('email_warning').style.color = 'green';
    document.getElementById('email_warning').innerHTML = 'matching';
  } else {
    document.getElementById('email_warning').style.color = 'red';
    document.getElementById('email_warning').innerHTML = 'not matching';
  }
}
// Password confirmation
var pass_check = function() {
  if (document.getElementById('password').value ==
    document.getElementById('confirm_password').value) {
    document.getElementById('password_warning').style.color = 'green';
    document.getElementById('password_warning').innerHTML = 'matching';
  } else {
    document.getElementById('password_warning').style.color = 'red';
    document.getElementById('password_warning').innerHTML = 'not matching';
  }
}

var myInput = document.getElementById("password");
var letter = document.getElementById("letter");
var capital = document.getElementById("capital");
var number = document.getElementById("number");
var length = document.getElementById("length");

// When the user clicks on the password field, show the message box
myInput.onfocus = function() {
  document.getElementById("message").style.display = "block";
}

// When the user clicks outside of the password field, hide the message box
myInput.onblur = function() {
  document.getElementById("message").style.display = "none";
}

// When the user starts to type something inside the password field
myInput.onkeyup = function() {
  // Validate lowercase letters
  var lowerCaseLetters = /[a-z]/g;
  if(myInput.value.match(lowerCaseLetters)) {  
    letter.classList.remove("invalid");
    letter.classList.add("valid");
  } else {
    letter.classList.remove("valid");
    letter.classList.add("invalid");
  }
  
  // Validate capital letters
  var upperCaseLetters = /[A-Z]/g;
  if(myInput.value.match(upperCaseLetters)) {  
    capital.classList.remove("invalid");
    capital.classList.add("valid");
  } else {
    capital.classList.remove("valid");
    capital.classList.add("invalid");
  }

  // Validate numbers
  var numbers = /[0-9]/g;
  if(myInput.value.match(numbers)) {  
    number.classList.remove("invalid");
    number.classList.add("valid");
  } else {
    number.classList.remove("valid");
    number.classList.add("invalid");
  }
  
  // Validate length
  if(myInput.value.length >= 8) {
    length.classList.remove("invalid");
    length.classList.add("valid");
  } else {
    length.classList.remove("valid");
    length.classList.add("invalid");
  }
}

function activateButton() {
  var checkBox = document.getElementById("conditions");
  if (checkBox.checked == true){
    document.getElementById("button").disabled = false;
    } else {
    document.getElementById("button").disabled = true;
  }
}

function showNDhide(elmtID)
  {
    var x = document.getElementById(elmtID);
    if (x.style.display === "none") { x.style.display = ""; }
    else { x.style.display = "none"; }
  }