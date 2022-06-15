<?php
include "../connection/dbconn.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$sid= $_POST['editSid'];
$name=$_POST['editName'];
$address=$_POST['editAddress'];
$contact=$_POST['editContact'];

$sql="UPDATE `student` SET `name`=:name,`address`=:address,`contact`=:contact WHERE `sid` = :id";


$stmt=$conn->prepare($sql);
$stmt->bindparam(':name',$name);
$stmt->bindparam(':address',$address);
$stmt->bindparam(':contact',$contact);
$stmt->bindparam(':id',$sid);

$stmt->execute();


header('location:http://localhost/lakashojt/project/index.php?edit=success');
}

?>