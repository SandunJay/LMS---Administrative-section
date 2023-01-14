
<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "skillup";

    // Create connection
    $connection = new mysqli($servername, $username, $password, $database);

    $id="";
    $name = "";
    $pass= "";
    $email= "";
    $phone= "";
    $address ="";
    
    $errorMessage = "";
    $successMessage = "";

    if($_SERVER['REQUEST_METHOD'] =='GET'){
        // GET method: show the data of the client

        if(!isset($_GET["id"])){
            header("Location: adminViewTeacher.php");
            exit();
        }

        $id= $_GET["id"];

        // Read the row of the selected client from database
        $sql = "SELECT * FROM user WHERE id=$id";
        $result = $connection ->query($sql);
        $row = $result-> fetch_assoc();

        if(!$row){
            header("Location: adminViewTeacher.php");
        }

        $name = $row["name"];
        $pass = $row["password"];
        $email = $row["email"];
        $phone = $row["phone"];
        $address = $row["address"];

    }
    else{
        // Post method: Update the data of the client
        $id = $_POST["id"];
        $name = $_POST["name"];
        $pass = $_POST["password"];
        $email = $_POST["email"];
        $phone = $_POST["phone"];
        $address = $_POST["address"];  

        do{
            if(empty($id) ||empty($name) ||empty($pass) ||empty($email) ||empty($phone) ||empty($address)){
                $errorMessage = "All the fields are required";
                break;
            }

            $sql = "UPDATE user "."SET name='$name', password='$pass', email= '$email', phone= '$phone', address= '$address'".
            "WHERE id= $id";

            $result = $connection->query($sql);

            if(!$result){
                $errorMessage = "Invalid query: " . $connection->error;
                break;
            }
            $successMessage = "Teacher updated successfullly";

            header("Location: adminViewTeacher.php");
            exit;

        }while (true);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add teachers</title>
    <script type="module" src="JS/adminmain.js"></script>
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/adminEdit.css">
    <script src="js/settings.js"></script>
</head>
<body>
<!-- import Header  -->
    <my-header></my-header>
<!-- Body content -->
    <section>
        <h2>Edit Teacher Details</h2>
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
<!-- Form -->

        <div class="form-container">
            <form method="post">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <div class="row">
                    <label class="text">Name</label>
                    <div class="col">
                        <input type="text" class="field" name="name" value="<?php echo $name; ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="column">
                        <label class="text">Password</label>
                        <input type="text" class="field" id="password" name="password" value="<?php echo $pass; ?>">
                    </div>
                    <div class="column">
                        <label class="text">Confirm password</label>
                        <input type="text" class="field" id="confirm_password" name="confirmPassword" onkeyup='pass_check();'>
                    </div>
                </div>
                <div class="row">
                    <span id='password_warning'></span>
                </div>
                <div class="row">
                    <label class="text">Email</label>
                    <div class="col">
                        <input type="text" class="field" name="email" value="<?php echo $email; ?>">
                    </div>
                </div>
                <div class="row">
                    <label class="text">Phone</label>
                    <div class="col">
                        <input type="text" class="field" name="phone" value="<?php echo $phone; ?>">
                    </div>
                </div>
                <div class="row">
                    <label class="text">Address</label>
                    <div class="col">
                        <input type="text" class="field" name="address" value="<?php echo $address; ?>">
                    </div>
                </div>
                <?php
                if(!empty($successMessage)){
                echo '<script type ="text/JavaScript"> alert("Teacher updated successfullly");  
                </script>';  
                }
                ?>
                <div class="row">
                    <div class="btn-row">
                        <div class="btn-col">
                            <button type="submit" class="btn">Submit</button>
                        </div>
                        <div class="btn-col">
                            <button href="adminViewTeacehr.php" class="btn">Cancel</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    <!-- Form -->
    </section>
<!-- Body content -->
<!-- import footer -->
    <my-footer></my-footer>
</body>
</html>