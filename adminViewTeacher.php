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
        <title>Edit Users</title>
        <link rel="stylesheet" href="CSS/header.css">
        <link rel="stylesheet" href="CSS/footer.css">
        <link rel="stylesheet" href="CSS/adminHome.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="CSS/AdminView.css">
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
<!-- Content -->
    <div class="container">
        <h2>List of Teachers</h2>
            <a href="adminAddTeachers.php" class="btn">New Teachers</a>
            <br><br>
            <div class="t-container">
                <table class="table" style="border: 1px solid #000 ;">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Password</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Added date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        $servername = "localhost";
                        $username = "root";
                        $password = "";
                        $database = "skillup";

                        // Create connection
                        $connection = new mysqli($servername, $username, $password, $database);
                        // chcek connection

                        if($connection->connect_error){
                            die("Connection Failed: "). $connection->connect_error;
                        }

                        // Read data from user table
                        $sql = "SELECT * FROM user";
                        $result = $connection->query($sql);

                        if (!$result) {
                            die("Invalid query:". $connection->error);
                        }

                        // Read data of each row
                        while ($row = $result->fetch_assoc()){
                            echo "
                            <tr>
                            <td>$row[id]</td>
                            <td>$row[name]</td>
                            <td>$row[password]</td>
                            <td>$row[email]</td> 
                            <td>$row[phone]</td>
                            <td>$row[address]</td>
                            <td>$row[created_at]</td>
                            <td>
                                <a href='adminEditTeacher.php?id=$row[id]' class='btn btn-primary btn-sm'>Edit</a>
                                <a href='adminDeleteTeacher.php?id=$row[id]' class='btn btn-primary btn-sm'>Delete</a>
                                <button id=$row[id]>Show</button>
                            </td>
                        </tr>
                        ";
                        }
                        ?>

                    </tbody>
                </table>
            </div>
    </div>
<!-- Content -->
<!-- Footer starts here-->
    <my-footer></my-footer>
<!-- Footer ends here -->

    <script src="JS/home.js"></script>
    <script>
        function hide() {
                var x = document.getElementById("password");
                if (x.style.display === "none") {
                    x.style.display = "block";
                } else {
                    x.style.display = "none";
                }
                }

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
    header("Location: adminHome.php");
    exit();
}
?>

$hidden_password = preg_replace('password',"*",$real_password);