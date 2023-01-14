
<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "skillup";

    // Create connection
    $connection = new mysqli($servername, $username, $password, $database);

    $name = "";
    $pass ="";
    $email = "";
    $phone = "";
    $address = "";

    $errorMessage = "";
    $successMessage = "";

    if($_SERVER['REQUEST_METHOD']== 'POST'){
        $name = $_POST["name"];
        $pass = $_POST["password"];
        $email = $_POST["email"];
        $phone = $_POST["phone"];
        $address = $_POST["address"];  
        
        do{
            if(empty($name) || empty($pass) || empty($email) ||empty($phone) ||empty($address)){
                $errorMessage = "All fields are required";
                break;
            }

            // Add new clients to database

            $sql = "INSERT INTO user (name,password, email, phone, address)". "VALUES('$name','$pass','$email','$phone','$address')";
            $result = $connection->query($sql);

            if(!$result){
                $errorMessage = "Invalid query: ". $connection->error;
                break;
            }    

            $name = "";
            $pass = "";
            $email = "";
            $phone = "";
            $address = "";

            $successMessage = "Teacher added successfully";

            header("Location: adminViewTeacher.php");
            exit();

        }while(false);
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add teachers</title>
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="CSS/footer.css">
    <link rel="stylesheet" href="css/adminEdit.css">
    <script type="module" src="JS/adminmain.js"></script>
    <script src="js/adminSettings.js"></script>
</head>
<body>
    <!--import Header -->
    <my-header></my-header>
    <!-- Header -->

    <!-- Content -->
    <section>
        <h2>New Teacher</h2>
        <?php
            if(!empty($errorMessage)){
                echo "
                <div class='alert alert-warning alert-dismissible fade-show' role='alert'>
                    <strong>$errorMessage</strong>
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='close'></button>
                </div>
                ";
            }
        ?>
        <div class="form-container">
            <form method="post" onkeyup="return checkPassword()">
                <div class="row">
                    <label class="text">Name</label>
                    <div class="col">
                        <input type="text" class="field" name="name" value="<?php echo $name; ?>" required>
                    </div>
                </div>
                <div class="row">
                    <div class="column">
                    <label class="text">Password</label>
                        <input type="text" class="field" id="password" name="password" value="<?php echo $pass; ?>" required>
                    </div>
                    <div class="column">
                    <label class="text">Confirm password</label>
                        <input type="text" class="field" id="confirm_password" name="confirmPassword" onkeyup='pass_check();'  oninput="enableBtn();" required>
                    </div>
                </div>
                <div class="row">
                    <span id='password_warning'></span>
                </div>
                <div class="row">
                    <label class="text">Email</label>
                    <div class="col">
                        <input type="text" class="field" name="email" value="<?php echo $email; ?>" required>
                    </div>
                </div>
                <div class="row">
                    <label class="text">Phone</label>
                    <div class="col">
                        <input type="text" class="field" name="phone" value="<?php echo $phone; ?>" required>
                    </div>
                </div>
                <div class="row">
                    <label class="text">Address</label>
                    <div class="col">
                        <input type="text" class="field" name="address" value="<?php echo $address; ?>" required>
                    </div>
                </div>

                <div class="container">
                        <div class="message">
                            <h3 style="color: yellow;">Password must contain the following:</h3>
                            <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
                            <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
                            <p id="number" class="invalid">A <b>number</b></p>
                            <p id="length" class="invalid">Minimum <b>8 characters</b></p>
                        </div>
                </div>

                <?php
                if(!empty($successMessage)){
                    echo"
                    <div class='row'>
                        <div class='btn-col'>
                            <div class='alert alert-success alert-dismissible fade-show' role='alert'>
                                <strong>$successMessage</strong>
                                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='close'></button>
                            </div>
                        </div>
                    </div>
                    ";
                }
                ?>
                <br>
                <div class="row">
                    <div class="btn-row">
                        <div class="btn-col">
                            <button type="submit" id="btn" class="btn" disabled>Submit</button>
                        </div>
                        <div class="btn-col">
                            <button href="adminViewTeacher.php" id="btn" class="btn">Cancel</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
<!-- Import footer -->
        <my-footer></my-footer>
<!-- Footer -->
<script>
    //Password content check
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

  
</script>
</body>
</html>