<?php
include "../connection/dbconn.php";
if(isset($_POST['login'])){
    $name=$_POST['username'];
    $pwd=$_POST['password'];

    // Checking whether the user exists or not by using username(unique)
    $sql="SELECT * FROM users WHERE username=:uName";
    $stmt=$conn->prepare($sql);
    $stmt->bindparam(":uName",$name);
    $stmt->execute();
    $result=$stmt->fetch(PDO::FETCH_OBJ);

    // If user not found
    if(empty($result)){
        header("location:http://localhost/lakashojt/day_20_to_day_un_loginSystem/loginPage.php?login=error");
    }
    else{
        // User is found and checking password if it matchs or not
        if($result->password==$pwd){
            session_start();
            $_SESSION['username'] = $result->username;
            header("location:/lakashojt/day_20_to_day_un_loginSystem/index.php?login=success");
        }
        else{
            // If password does not match
        header("location:http://localhost/lakashojt/day_20_to_day_un_loginSystem/loginPage.php?login=error");

        }
    }

}
