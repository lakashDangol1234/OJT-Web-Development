<?php
include "../connection/dbconn.php";
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['deleteSid'])) {
    $sid = $_POST['deleteSid'];

    $sql = "DELETE FROM `studentWithClass` WHERE `sid` = :id";

    $stmt = $conn->prepare($sql);
    $stmt->bindparam(':id', $sid);

    $stmt->execute();

    header('location:http://localhost/lakashojt/day_29_to_day_un_oop/admin/showStudent.php?delete=success');
}

