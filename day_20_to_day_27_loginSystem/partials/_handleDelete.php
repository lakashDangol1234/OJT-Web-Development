<?php
include "../connection/dbconn.php";
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['deleteSid'])) {
    $sid = $_POST['deleteSid'];

    $sql = "DELETE FROM `student` WHERE `sid` = :id";

    $stmt = $conn->prepare($sql);
    $stmt->bindparam(':id', $sid);

    $stmt->execute();

    header('location:http://localhost/lakashojt/day_20_to_day_un_loginSystem/admin/showStudent.php?delete=success');
}

