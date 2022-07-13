<?php
include "../partials/_studentUtils.php";
include "../connection/dbconn.php";
session_start();
if (empty($_SESSION['username']) && empty($_SESSION['admin'])) {
    header("location:loginPage.php");
}
if (!empty($_SESSION['username']) && empty($_SESSION['admin'])) {
    header("location:index.php?permission=denied");
}
$inserted = false;
if (isset($_POST['save'])) {
    $name = $_POST['name'];
    $address = $_POST['address'];
    $contact = $_POST['contact'];
    $clas = $_POST['class'];
    $section = $_POST['section'];
    $gender=$_POST['gender'];

    $sql = "INSERT INTO `studentWithClass` (`name`, `address`, `contact`,`class`,`section`,`gender`) VALUES ('$name', '$address', '$contact','$clas','$section','$gender')";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    
    $inserted = true;
}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add Student</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>

<body>
    <?php
    if (isset($_GET['editMethod2']) && $_GET['editMethod2'] == "true") {
        include "partials/_header_forEditMethod2.php";
    } else {
        include "../partials/_header.php";
    }
    ?>

    <!-- Alert Message  -->
    <div class="position-absolute w-100">
        <div class="alert alert-success alert-dismissible fade show d-none" role="alert" id="added-alert">
            <strong>Success!</strong> Student was added successfully!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>

    <div class="container my-5 py-3">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <input type="text" class="form-control" id="address" name="address" required>
            </div>
            <div class="mb-3">
                <label for="contact" class="form-label">Contact</label>
                <input type="text" class="form-control" id="contact" name="contact" required>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="class" class="form-label">Class</label>
                        <select class="form-select" aria-label="Default select example" id="class" name="class" required>
                            <option value="10" selected>10</option>
                            <option value="9">9</option>
                            <option value="8">8</option>
                            <option value="7">7</option>
                            <option value="6">6</option>
                            <option value="5">5</option>
                            <option value="4">4</option>
                            <option value="3">3</option>
                            <option value="2">2</option>
                            <option value="1">1</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="section" class="form-label">Section</label>
                        <select class="form-select" aria-label="Default select example" id="section" name="section" required>
                            <option value="A" selected>A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                            <option value="D">D</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-12">
                    <p class="form-label">Gender</p>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="male" value="male" checked/>
                        <label class="form-check-label" for="male">Male</label>
                    </div>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="female" value="female" />
                        <label class="form-check-label" for="female">Female</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="others" value="others" />
                        <label class="form-check-label" for="others">Others</label>
                    </div>
                </div>

            </div>


            <button type="submit" class="btn btn-primary" name="save">Add Student</button>
        </form>
    </div>






    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

    <script>
        document.getElementById('addStudent').classList.add('active');
    </script>

    <?php
    if ($inserted) {
        echo '<script src="../javascript/addStudentAlert.js"></script>';
    }
    ?>


</body>

</html>