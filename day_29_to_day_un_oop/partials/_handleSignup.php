<?php
include "../connection/dbconn.php";
include "../admin/adminPassword.php";
if (isset($_POST['signup'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $pwd = $_POST['password'];
    $adminPassword=$_POST['admin_password']; // adminPassword is "" when not provided


    // Validation
    $validUsername = preg_match('/^[a-zA-Z][0-9a-zA-Z_ ]{2,}$/', $username);
    $validEmail = filter_var($email, FILTER_VALIDATE_EMAIL);
    $validContact = filter_var($contact, FILTER_VALIDATE_INT);
    $validPassword = strlen($pwd) > 4 ? true : false;


    if ($validUsername && $validEmail && $validContact && $validPassword) { // Validation Success

        // Checking whether the user already exists or not by using username(unique)
        $sql = "SELECT * FROM users WHERE username=:uName OR email=:uEmail";
        $stmt = $conn->prepare($sql);
        $stmt->bindparam(":uName", $username);
        $stmt->bindparam(":uEmail", $email);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_OBJ);

        // If user exists
        if (!empty($result)) {
            header("location:http://localhost/lakashojt/day_29_to_day_un_oop/signupPage.php?userExists=true");
        } else {
            // If user doesnot exists then, sign up is successfull
            $sql = "INSERT INTO `users` (`username`, `email`, `contact`,`password`,`navBarTheme`) VALUES ('$username', '$email', '$contact','$pwd','dark')";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            session_start();
            $_SESSION['username'] = $username;
            $_SESSION['navbarTheme']='dark';
            if($adminPassword===$admin_password){$_SESSION['admin']=true;}
            header("location:/lakashojt/day_29_to_day_un_oop/index.php?signup=success");
        }
    } else {
        //Validation fails 
        header("location:http://localhost/lakashojt/day_29_to_day_un_oop/signupPage.php?invalidCredentials=true");
    }
}
?>