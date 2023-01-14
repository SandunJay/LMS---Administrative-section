<?php
session_start();
 // Auto logout
 $inactive = 600;
 if(isset($_SESSION['timeout']) ) {
         $session_life = time() - $_SESSION['timeout']; 	
         if($session_life > $inactive){ 
             session_destroy(); 
             header("location: admin.php"); } }


include "db_conn.php";

if(isset($_POST['uname']) && isset($_POST['password'])){

    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
}

$uname = validate($_POST['uname']);
$pass = validate($_POST['password']);

if(empty($uname)){
    header("location: admin.php?error=User Name is required");
    exit();
}

else if (empty($pass)) {
    header("Location: admin.php?error=Password is required");
    exit();
}

$sql = "SELECT * FROM admin WHERE user_name= '$uname' and password='$pass'";

$result = mysqli_query($conn,$sql);

if(mysqli_num_rows($result) === 1){
    $row = mysqli_fetch_assoc($result);
    if($row['user_name']=== $uname && $row['password'] === $pass) {
        echo "Logged In!";
        $_SESSION['user_name']= $row['user_name'];
        $_SESSION['name'] = $row['name'];
        $_SESSION['id'] = $row['id'];
        header("Location: adminHome.php");
        exit();
    }

    else{
        header("Location: admin.php?error=Incorrect User Name or Password");
        exit();
    }

}
else {
    header("Location: admin.php");
    exit();
}