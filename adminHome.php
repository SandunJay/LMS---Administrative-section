<?php
session_start();
// Auto logout
$inactive = 600;
if(isset($_SESSION['timeout']) ) {
     	$session_life = time() - $_SESSION['timeout']; 	
        if($session_life > $inactive){ 
            session_destroy(); 
            header("location: admin.php"); } }

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {
?>

<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=\, initial-scale=1.0">
        <title>Home</title>
        <link rel="stylesheet" href="CSS/header.css">
        <link rel="stylesheet" href="CSS/footer.css">
        <link rel="stylesheet" href="CSS/adminHome.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script type="module" src="JS/adminmain.js"></script>
    </head>

    <body>
<!-- Header starts here -->
    <my-header></my-header>
<!-- Header ends here -->
<!-- Username and logout -->
     <div class="logout_container">
        <div class="name" >
          <a href="profileSettings.html"><?php echo $_SESSION['user_name']; ?></a> 
      </div>
        <div class="logout">
            <a href="logout.php">Logout</a>
        </div>
    </div>
<!-- Username and logout -->
    <!-- Institute details start -->
    <div class="details-container">
            <div class="row">
                <div class="column1" style="background-color:#000000;">
                    <div class="card1">
                    <div class="container">  
                    <a href="adminViewCourse.php">
                        <div class="card">  
                            <div class="imgBx">  
                                <img src="Img/admin/PngItem_6883477.png" alt="Edit Courses">  
                            </div>  
                            <div class="contentBx">  
                                <h2>Courses</h2>  
                            </div>  
                        </div>  
                    </a> 
                    </div>  
                    </div>
                </div>
                <center>
                  <div class="card2">
                  <div class="container">  
                    <a href="adminUserSelection.php">
                        <div class="card">  
                            <div class="imgBx">  
                                <img src="Img/admin/—Pngtree—training coaching character cartoon free_4572096.png" alt="Edit users">  
                            </div>  
                            <div class="contentBx">  
                                <h2>Users</h2>  
                            </div>  
                        </div>
                    </a>   
                    </div>  
                </div>
              </center>
            </div>
        </div>
<!-- Institute details ends here -->
<!-- Footer starts here-->
  <my-footer></my-footer>
      <!-- Footer ends here -->
    <script>
        function getUSername(){
            var text = <?php $_SESSION['user_name']; ?>
        }
        function displayUsername(){
            if (text !== null){
                document.querySelector("Register/login").innerHTML = text;
            }
            else {
                document.querySelector("Register/login").innerHTML = "Register/login";
            }
        }
    </script>
    </body>
    </html>

    <?php
}

else{
    header("Location: index.php");
    exit();
}
?>