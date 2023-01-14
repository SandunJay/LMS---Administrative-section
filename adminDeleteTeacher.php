<?php

if(isset($_GET["id"])){
    $id = $_GET["id"];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "skillup";

    // Create connection
    $connection = new mysqli($servername, $username, $password, $database);

    $sql= "DELETE FROM user WHERE id=$id";
    $connection->query($sql);

}

header("Location: adminViewTeacher.php");
exit;
?>