
<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "skillup";

    // Create connection
    $connection = new mysqli($servername, $username, $password, $database);

    $cid=""; 
    $name = "";
    $fee = "";
    $start_date = "";
    $end_date = "";
    $description="";

    $errorMessage = "";
    $successMessage = "";

    if($_SERVER['REQUEST_METHOD'] =='GET'){
        // GET method: show the data of the client

        if(!isset($_GET["cid"])){
            header("Location: adminViewCourse.php");
            exit();
        }

        $cid= $_GET["cid"];

        // Read the row of the selected client from database
        $sql = "SELECT * FROM course WHERE cid=$cid";
        $result = $connection ->query($sql);
        $row = $result-> fetch_assoc();

        if(!$row){
            header("Location: adminViewCourse.php");
        }

        $name = $row["name"];
        $fee = $row["fee"];
        $start_date = $row["start_date"];
        $end_date = $row["end_date"];
        $description=$row["description"];

    }
    else{
        // Post method: Update the data of the client
        $cid = $_POST["cid"];
        $name = $_POST["name"];
        $fee = $_POST["fee"];
        $start_date = $_POST["start_date"];
        $end_date = $_POST["end_date"];
        $description=$_POST["description"]; 

        do{
            if(empty($cid) ||empty($name) || empty($fee) ||empty($start_date) ||empty($end_date)||empty($description)){
                $errorMessage = "All the fields are required";
                break;
            }

            $sql = "UPDATE user "."SET name='$name', fee= '$fee', start_date= '$start_date', end_date= '$address',description = '$description'".
            "WHERE cid= $cid";

            $result = $connection->query($sql);

            if(!$result){
                $errorMessage = "Invalid query: " . $connection->error;
                break;
            }
            $successMessage = "Course updated successfullly";

            header("Location: adminViewCourse.php");
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
    <title>Add Course</title>
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/adminEdit.css">
    <script type="module" src="JS/adminmain.js"></script>
</head>
<body>
    <!-- import Header -->
    <my-header></my-header>
    <!-- content -->
    <section>
        <h2>New Course</h2>
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
            <form method="post">
                <input type="hidden" name="cid" value="<?php echo $cid; ?>">
                <div class="row">
                    <label class="text">Name</label>
                    <div class="col">
                        <input type="text" class="field" name="name" value="<?php echo $name; ?>">
                    </div>
                </div>
                <div class="row">
                    <label class="text">Fee</label>
                    <div class="col">
                        <input type="text" class="field" name="fee" value="<?php echo $fee; ?>">
                    </div>
                </div>
                <div class="row">
                    <label class="text">Start date</label>
                    <div class="col">
                        <input type="text" class="field" name="start_date" value="<?php echo $start_date; ?>">
                    </div>
                </div>
                <div class="row">
                    <label class="text">End date</label>
                    <div class="col">
                        <input type="text" class="field" name="end_date" value="<?php echo $end_date; ?>">
                    </div>
                </div>
                <div class="row">
                    <label class="text">Description</label>
                    <div class="col">
                        <input type="text" class="field" name="description" value="<?php echo $description; ?>">
                    </div>
                </div>

                <?php
                if(!empty($successMessage)){
                    echo '<script type ="text/JavaScript"> alert("Teacher updated successfullly");  
                    </script>';  
                }
                ?>
                <div class="row">
                    <div class="btn-col">
                        <button type="submit" class="btn">Submit</button>
                    </div>
                    <div class="btn-col">
                        <button href="adminViewCourse.php" class="btn">Cancel</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <!-- import footer -->
    <my-footer></my-footer>
</body>
</html>