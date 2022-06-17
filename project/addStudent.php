<?php
include "connection/dbconn.php";
$inserted = false;
if (isset($_POST['save'])) {
    $name = $_POST['name'];
    $address = $_POST['address'];
    $contact = $_POST['contact'];

    $sql = "INSERT INTO `student` (`name`, `address`, `contact`) VALUES ('$name', '$address', '$contact')";
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
    if(isset($_GET['editMethod2']) && $_GET['editMethod2']=="true"){
        include "partials/_header_forEditMethod2.php";
    } else{
        include "partials/_header.php";
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
            <button type="submit" class="btn btn-primary" name="save">Add Student</button>
        </form>
    </div>






    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

    <script>
        document.getElementById('addStudent').classList.add('active');
    </script>

    <?php
    if ($inserted) {
        echo '<script src="./javascript/addStudentAlert.js"></script>';
    }
    ?>


</body>

</html>