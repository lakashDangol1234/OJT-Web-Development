<?php
session_start();
if (isset($_SESSION['username'])) {
    header("location:/lakashojt/day_20_to_day_un_loginSystem/index.php");
}
?>

<?php
$showAlert = false;
if ($_SERVER['REQUEST_METHOD'] === "GET" && isset($_GET['login']) && $_GET['login'] == "error") {
    $showAlert = true;
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
        <div class="alert alert-danger alert-dismissible fade show" role="alert" id="userError-alert">
            <strong>Error!</strong>
            User Not Found !
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>';
    }
    ?>

    <div class="container-fluid container-md my-5 py-3">
        <h1>Login Page</h1>
        <form method="POST" action="/lakashojt/day_20_to_day_un_loginSystem/partials/_handleLogin.php">
            <div class="mb-3">
                <label for="username" class="form-label">User Name</label>
                <input type="text" class="form-control" id="Username" placeholder="username" name="username" required />
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="Password" placeholder="password" name="password" required />
            </div>
            <div class="d-flex justify-content-between">
                <button type="submit" name="login" class="btn btn-primary">Submit</button>
                <a href="#">Forget Password?</a>
            </div>
        </form>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

    <?php
    if ($showAlert) {
        echo '<script>
        setTimeout(() => {
            document.getElementById("userError-alert").classList.add("d-none");
        }, 5000);
    </script>';
    }
    ?>


</body>

</html>