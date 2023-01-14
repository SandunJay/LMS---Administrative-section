
<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "skillup";

    // Create connection
    $connection = new mysqli($servername, $username, $password, $database);

    $id="";
    $name = "";
    $email= "";
    $phone= "";
    $password ="";
    
    $errorMessage = "";
    $successMessage = "";

    if($_SERVER['REQUEST_METHOD'] =='GET'){
        // GET method: show the data of the client

        if(!isset($_GET["sid"])){
            // header("Location: Home.html");
            exit();
        }

        $id= $_GET["id"];

        // Read the row of the selected client from database
        $sql = "SELECT * FROM student WHERE id=$sid";
        $result = $connection ->query($sql);
        $row = $result-> fetch_assoc();

        if(!$row){
            header("Location: Home.html");
        }

        $name = $row["name"];
        $email = $row["email"];
        $phone = $row["phone"];
        $password = $row["password"];

    }
    else{
        // Post method: Update the data of the client
        $sid = $_POST["sid"];
        $name = $_POST["name"];
        $email = $_POST["email"];
        $phone = $_POST["phone"];
        $password = $_POST["password"];  

        do{
            if(empty($sid) ||empty($name) ||empty($email) ||empty($phone) ||empty($password)){
                $errorMessage = "All the fields are required";
                break;
            }

            $sql = "UPDATE user "."SET name='$name', email= '$email', phone= '$phone', password= '$password'".
            "WHERE id= $sid";

            $result = $connection->query($sql);

            if(!$result){
                $errorMessage = "Invalid query: " . $connection->error;
                break;
            }
            $successMessage = "Settings updated successfullly";

            // header("Location: Home.html");
            exit;

        }while (true);
}
?>