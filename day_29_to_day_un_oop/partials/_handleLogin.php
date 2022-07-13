<?php
include "../admin/adminPassword.php";
include "../connection/dbconn.php";
if (isset($_POST['login'])) {
    $usernameOrEmail = $_POST['email_username'];
    $pwd = $_POST['password'];
    $adminPassword=$_POST['admin_password']; // adminPassword is "" when not provided


    // Validation
    $validUsername = preg_match('/^[a-zA-Z][0-9a-zA-Z_ ]{2,}$/', $usernameOrEmail);
    $validEmail = filter_var($usernameOrEmail, FILTER_VALIDATE_EMAIL);
    $validPassword = strlen($pwd) > 4 ? true : false;


    if (($validUsername || $validEmail) && ($validPassword)) { // Validation Success
        // Checking whether the user exists or not by using username or email(unique)
        $sql = "SELECT * FROM users WHERE username=:uName_email OR email=:uName_email";
        $stmt = $conn->prepare($sql);
        $stmt->bindparam(":uName_email", $usernameOrEmail);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_OBJ);

        // If user not found
        if (empty($result)) {
            header("location:http://localhost/lakashojt/day_29_to_day_un_oop/loginPage.php?login=error");
        } else {
            // User is found and checking password if it matches or not
            if ($result->password == $pwd) {
                session_start();
                $_SESSION['username'] = $result->username;
                $_SESSION['navbarTheme']=$result->navBarTheme;
                if($adminPassword===$admin_password){$_SESSION['admin']=true;}
                header("location:/lakashojt/day_29_to_day_un_oop/index.php?login=success");
            } else {
                // If password does not match
                header("location:http://localhost/lakashojt/day_29_to_day_un_oop/loginPage.php?login=error");
            }
        }
    }else{
        // Validation fails
        header("location:http://localhost/lakashojt/day_29_to_day_un_oop/loginPage.php?login=error");
    }
}

?>