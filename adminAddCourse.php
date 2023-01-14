
<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "skillup";

    // Create connection
    $connection = new mysqli($servername, $username, $password, $database);

    $name = "";
    $fee = "";
    $start_date = "";
    $end_date = "";
    $description="";

    $errorMessage = "";
    $successMessage = "";

    if($_SERVER['REQUEST_METHOD']== 'POST'){
        $name = $_POST["name"];
        $fee = $_POST["fee"];
        $start_date = $_POST["start_date"];
        $end_date = $_POST["end_date"];
        $description = $_POST["description"];    
        
        do{
            if(empty($name) || empty($fee) ||empty($start_date) ||empty($end_date)||empty($description)){
                $errorMessage = "All fields are required";
                break;
            }

            // Add new clients to database

            $sql = "INSERT INTO course (name, fee, start_date , end_date, description)". "VALUES('$name','$fee','$start_date','$end_date','$description')";
            $result = $connection->query($sql);

            if(!$result){
                $errorMessage = "Invalid query: ". $connection->error;
                break;
            }    

            $name = "";
            $fee = "";
            $start_date = "";
            $end_date = "";
            $description="";

            $successMessage = "Course added successfully";

            header("Location: adminViewCourse.php");
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
    <title>Add Courses</title>
    <link rel="stylesheet" href="CSS/header.css">
    <link rel="stylesheet" href="CSS/footer.css">
    <link rel="stylesheet" href="css/adminEdit.css">
    <script type="module" src="JS/adminmain.js"></script>

</head>
<body>
    <!-- Import header -->
    <my-header></my-header>
    <!-- Form -->
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
                    <div class="row">
                        <label class="text">Name</label>
                        <div class="col">
                            <input type="text" class="field" name="name" value="<?php echo $name; ?>" required>
                        </div>
                    </div>
                    <div class="row">
                        <label class="text">Fee</label>
                        <div class="col">
                            <input type="text" class="field" name="fee" value="<?php echo $fee; ?>" required>
                        </div>
                    </div>
                    <div class="row">
                        <label class="text">Start date</label>
                        <div class="col">
                            <input type="text" class="field" id="start_date"name="start_date" value="<?php echo $start_date; ?>" required>
                        </div>
                    </div>
                    <div class="row">
                        <label class="text" >End Date</label>
                        <div class="col">
                            <input type="text" class="field" id="end_date" name="end_date" value="<?php echo $end_date; ?>" onkeyup='date_check()'; required>
                        </div>
                    </div>
                    <div class="row">
                        <span id='date_warning'></span>
                        fdrffdffdfjkfdd
                    </div>
                    <div class="row">
                        <label class="text">Description</label>
                        <div class="col">
                            <input type="text" class="field" name="description" value="<?php echo $description; ?>" required>
                        </div>
                    </div>

                    <?php
                    if(!empty($successMessage)){
                        echo"
                        <div class='row'>
                            <div class='offset-sm-3 col'>
                                <div class='alert alert-success alert-dismissible fade-show' role='alert'>
                                    <strong>$successMessage</strong>
                                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='close'></button>
                                </div>
                            </div>
                        </div>
                        ";
                    }
                    ?>
                    <div class="row">
                        <div class="btn-col">
                            <button type="submit" class="btn">Submit</button>
                        </div>
                        <div class="btn-col">
                            <button href="adminViewTeacher.php" class="btn">Cancel</button>
                        </div>
                    </div>
                </form>
            </div>
        </section>

    <script src="JS/adminAddCourse.js"></script>
    <!-- Footer import -->
    <my-footer></my-footer>
</body>
</html>