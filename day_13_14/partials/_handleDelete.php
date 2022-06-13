<?php
include "../connection/dbconn.php";

$sid= $_GET['id'];

$sql = "DELETE FROM `student` WHERE `sid` = :id";

$stmt=$conn->prepare($sql);
$stmt->bindparam(':id',$sid);

$stmt->execute();


header('location:http://localhost/lakashojt/day_13_14/index.php');
?>