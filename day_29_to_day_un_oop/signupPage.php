<?php
session_start();
if (isset($_SESSION['username'])) {
    header("location:/lakashojt/day_29_to_day_un_oop/index.php");
}
?>

<?php
$invalidCredentials = false;
$showAlert = false;
$userExists = false;
if ($_SERVER['REQUEST_METHOD'] === "GET" && isset($_GET['invalidCredentials']) && $_GET['invalidCredentials'] == "true") {
    $showAlert = true;
    $invalidCredentials = true;
}
if ($_SERVER['REQUEST_METHOD'] === "GET" && isset($_GET['userExists']) && $_GET['userExists'] == "true") {
    $showAlert = true;
    $userExists = true;
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>

<body>

    <?php include "partials/_header.php" ?>


    <!-- Alert Message User Not found -->
    <?php
    if ($showAlert) {
        echo '<div class="position-absolute w-100">
        <div class="alert alert-danger alert-dismissible fade show" role="alert" id="invalidDetail-alert">
            <strong>Error! </strong>';
        if ($invalidCredentials) {
            echo "Invalid Credentials ! Make sure You have entered correct Details";
        }
        if ($userExists) {
            echo "User Already Exists";
        }
        echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>';
    }
    ?>

    <div class="container-fluid container-md my-5 py-3">
        <div class="d-flex justify-content-between align-items-center">
            <h1>Sign up Page</h1>
            <button id="signupAsAdmin_guest" class="btn btn-primary" style="cursor:pointer;">Signup as Admin?</button>
        </div>


        <form method="POST" action="/lakashojt/day_29_to_day_un_oop/partials/_handleSignup.php" class="my-4">
            <div class="mb-3 d-none" id="admin_password_formBox">
                <label for="admin_password" class="form-label">Admin Password</label>
                <input type="password" class="form-control" id="admin_password" placeholder="Admin Password" name="admin_password"/>
            </div>
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Username" required />
                <div id="usernameHelp" class="form-text">Username must start with alphabets and can contain numbers,alphabets and underscore</div>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Email Address" aria-describedby="emailHelp" required />
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label for="contact" class="form-label">Contact</label>
                <input type="text" class="form-control" id="contact" name="contact" placeholder="Contact" required />
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Password" minlength="5" required />
            </div>
            <div class="d-flex justify-content-between">
                <button type="submit" name="signup" class="btn btn-primary">Sign Up</button>
                <a href="/lakashojt/day_29_to_day_un_oop/loginPage.php">Already had an account?</a>
            </div>
        </form>



    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>


    <!-- Custom JavaScript -->
    <script src="./javascript/signupPageAdminHandle.js"></script>
    <?php
    if ($showAlert) {
        echo '<script>
        setTimeout(() => {
            document.getElementById("invalidDetail-alert").classList.add("d-none");
        }, 5000);
    </script>';
    }
    ?>


</body>

</html>