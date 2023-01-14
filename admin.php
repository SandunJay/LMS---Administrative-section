<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="CSS/header.css">
    <link rel="stylesheet" href="CSS/footer.css">
    <link rel="stylesheet" href="CSS/adminLogin.css">
    <script type="module" src="JS/main.js"></script>
</head>
<body>
<!-- Header starts here -->
    <my-header></my-header>
<!-- Header ends here -->
<!-- Login Form starts here -->
    <form action="adminlogin.php" method="post">
    <?php if (isset($_GET['error'])) { ?>
        <p class="error"> <?php echo $_GET['error']; ?></p>
    <?php } 
    ?>
    <div class="container">
        <div class="form-container">
            <div class="text">
                <h1>Admin login</h1>
            </div>
            <div  class="form">
                <div class="animated-input">
                    <input type="text" name="uname" id="cred" placeholder="Username.....">
                    <input type="password" name="password" id="cred" placeholder="Password......">
                </div>
                <div class="check">
                    <div>
                        <input type="checkbox" id="check">
                        <label for="check" class="disc"></label>
                        <label for="check" class="remember">Remember</label>
                    </div>
                </div>
            </div>
            <button class="btn" type="submit">LOGIN</button>
        </div>
        </div>
    </form>
<!-- Login form ends here -->
<!-- Footer starts here-->
      <my-footer></my-footer>
<!-- Footer ends here -->
  </body>

</body>
</html>