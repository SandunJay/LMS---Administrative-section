<?php

if(isset($_GET["cid"])){
    $cid = $_GET["cid"];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "skillup";

    // Create connection
    $connection = new mysqli($servername, $username, $password, $database);

    $sql= "DELETE FROM course WHERE cid=$cid";
    $connection->query($sql);

}

header("Location: adminViewCourse.php");
exit;
?>