<?php
include "../connection/dbconn.php";
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['deleteSid']) && !isset($_GET['editMethod2'])) {
    $sid = $_POST['deleteSid'];

    $sql = "DELETE FROM `student` WHERE `sid` = :id";

    $stmt = $conn->prepare($sql);
    $stmt->bindparam(':id', $sid);

    $stmt->execute();

    header('location:http://localhost/lakashojt/day_13_to_day_19_project_CRUD/index.php?delete=success');
}


// For edit Method 2 . Redirecting to index_editMethod2.php after deletion if the delete button is clicked from index_editMethod2.php
if (isset($_GET['editMethod2']) && $_GET['editMethod2'] == "true") {
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['deleteSid'])) {
        $sid = $_POST['deleteSid'];

        $sql = "DELETE FROM `student` WHERE `sid` = :id";

        $stmt = $conn->prepare($sql);
        $stmt->bindparam(':id', $sid);

        $stmt->execute();

        header('location:http://localhost/lakashojt/day_13_to_day_19_project_CRUD/index_editMethod2.php?delete=success');
    }
}
