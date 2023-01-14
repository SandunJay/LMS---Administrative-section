<!DOCTYPE html>
<html lang="en-US">

<head>
    <link rel="stylesheet" href="libs/style.css">

    <head>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="./CSS/profile.css">
        <!-- <link rel="stylesheet" href="./CSS/login.css"> -->
        <link rel="stylesheet" href="./CSS/header.css">
        <link rel="stylesheet" href="./CSS/footer.css">
    </head>
    <?php
    include './connection.php';
    session_start();
    $id = $_SESSION['id'];
    $query = mysqli_query($db, "SELECT * FROM users where user_id='1'") or die(mysqli_error());
    $row = mysqli_fetch_array($query);
    ?>
    <header>
        <a href="#" class="logo">
            <img src="Img/SkillUP dark.png" width="100px" height="100px" alt="Academy logo" />
        </a>
        <navbar>
            <a href="#" class="active">Home</a>
            <a href="CourseHome.html">Courses</a>
            <a href="Lessons.html">lessons</a>
            <a href="Contact.html">Contact</a>
            <a href="FAQ.html">FAQ</a>
            <a href="login.html">Login</a>
        </navbar>
        <search_bar>
            <form class="search">
                <input type="text" placeholder="Search....." class="input">
                <button type="submit" class="button">
                    <i class="ri-search-2-line"></i>
                </button>
            </form>
        </search_bar>
    </header>
    <!-- Header ends here -->
<body>

    <div class="profile-input-field">
        <div class="card">
            <h2 style="text-align:center">User Profile</h2>
            <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle" width="150">
            <form method="post">
                <h1><?php echo $row['username']; ?></h1>
                <label>Full Name</label>
                <input type="text" name="full_name" style="width:20em;" placeholder="Enter your Full Name" value="<?php echo $row['full_name']; ?>" required/>

                <br>
                <label>Email</label>
                <input type="email" name="email" style="width:20em;"  placeholder="Enter your Email" value="<?php echo $row['email']; ?>" >

                <br>
                <label>Gender</label>
                <input type="text" name="gender" style="width:20em;" placeholder="Enter your Gender"  value="<?php echo $row['gender']; ?>" />

                <br>
                <label>Age :</label>
                <input type="text" name="age" style="width:20em;" placeholder="Enter your Age"  value="<?php echo $row['age']; ?>" />

                <br>
                <label>Address</label>
                <input type="text" name="address" style="width:20em;"  placeholder="Enter your Address" value="<?php echo $row['address']; ?>"></textarea>

                <label class="card-lbl"><a href="./cardInfo.php"> Edit Card Information</a></label>
                <br>
                <div style="margin: 24px 0;">
                    <a href="#"><i class="fa fa-facebook"></i></a>
                    <a href="#"><i class="fa fa-twitter"></i></a>
                    <a href="#"><i class="fa fa-linkedin"></i></a>
                </div>
                <input type="submit" name="submit" class="btn btn-primary" style="width:20em; margin:0;"><br><br>
            </form>
        </div>
        <br><br>

        <!-- Footer starts here-->
        <div class="footer">
            <div class="foo_container">
                <div class="foo_row">
                    <div>
                        <img src="Img/SkillUP dark.png" width="200px" height="200px">
                    </div>
                    <div class="footer-col">
                        <h4>SkillUP</h4>
                        <ul>
                            <li><a href="#">About us</a></li>
                            <li><a href="#">Services</a></li>
                            <li><a href="#">Privacy policy</a></li>
                        </ul>
                    </div>
                    <div class="footer-col">
                        <h4>Help</h4>
                        <ul>
                            <li><a href="#">FAQ</a></li>
                            <li><a href="#">Payments</a></li>
                            <li><a href="#">Privacy policy</a></li>
                        </ul>
                    </div>
                    <div class="footer-col">
                        <h4>Follow us on</h4>
                        <div class="social-links">
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                            <a href="#"><i class="fab fa-Instagram-f"></i></a>
                            <a href="#"><i class="fab fa-Linkedin-in-f"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer ends here -->
        <script src="./JS/header.js"></script>

</html>
<!-- User Details Update -->
<?php
if (isset($_POST['submit'])) {
    $fullname = $_POST['full_name'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $query = "UPDATE users SET full_name = '$fullname',
                      gender = '$gender', age = $age, email = '$email', address = '$address'
                      WHERE user_id = '1'";
    $result = mysqli_query($db, $query);
?>
    <script type="text/javascript">
        alert("Update Successfully.");
        window.location = "./userProfile.php";
    </script>
<?php
}
?>