<?php
include "../connection/dbconn.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$sid= $_POST['deleteSid'];

$sql = "DELETE FROM `student` WHERE `sid` = :id";

$stmt=$conn->prepare($sql);
$stmt->bindparam(':id',$sid);

$stmt->execute();


header('location:http://localhost/lakashojt/project/index.php?delete=success');
}
?>