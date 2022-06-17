<?php

include "../connection/dbconn.php";

// When user comes to this page, below code will be execute so that we can display the name,address,contact in the input field already through the value attribute. so that we can edit it
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $sid = $_GET['id'];

    $sql = "SELECT * FROM `student` WHERE `sid`=:id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":id", $sid);
    $result = $stmt->execute();

    $student = $stmt->fetch(PDO::FETCH_ASSOC);
}




// Updating the students When user click on update button
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
    $sid = $_GET['editSid'];
    $name = $_POST['editName'];
    $address = $_POST['editAddress'];
    $contact = $_POST['editContact'];

    $sql = "UPDATE `student` SET `name`=:name,`address`=:address,`contact`=:contact WHERE `sid` = :id";


    $stmt = $conn->prepare($sql);
    $stmt->bindparam(':name', $name);
    $stmt->bindparam(':address', $address);
    $stmt->bindparam(':contact', $contact);
    $stmt->bindparam(':id', $sid);

    $stmt->execute();


    header('location:http://localhost/lakashojt/project/index_editMethod2.php?edit=success');
}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Project</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>

<body>

    <?php include "_header_forEditMethod2.php"; ?>

    <div class="container-fluid container-md my-5 py-3">

        <form id="editStudentForm" action="/lakashojt/project/partials/_handleEdit_method2.php?editSid=<?php echo $sid ?>" method="POST">
            <div class="modal-body">
                <div class="mb-3">
                    <label for="editName" class="form-label">Name</label>
                    <input type="text" class="form-control" id="editName" name="editName" value="<?php echo $student['name']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="editAddress" class="form-label">Address</label>
                    <input type="text" class="form-control" id="editAddress" name="editAddress" value="<?php echo $student['address']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="editContact" class="form-label">Contact</label>
                    <input type="text" class="form-control" id="editContact" name="editContact" value="<?php echo $student['contact']; ?>" required>
                </div>
                <button type="submit" class="btn btn-primary" name="update">Update</button>
            </div>

        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

</body>

</html>