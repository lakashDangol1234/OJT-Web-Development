<?php
include "../connection/dbconn.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$sid= $_POST['editSid'];
$name=$_POST['editName'];
$address=$_POST['editAddress'];
$contact=$_POST['editContact'];
$clas=$_POST['editClass'];
$section=$_POST['editSection'];

$sql="UPDATE `studentWithClass` SET `name`=:name,`address`=:address,`contact`=:contact,`class`=:class,`section`=:section WHERE `sid` = :id";


$stmt=$conn->prepare($sql);
$stmt->bindparam(':name',$name);
$stmt->bindparam(':address',$address);
$stmt->bindparam(':contact',$contact);
$stmt->bindparam(':id',$sid);
$stmt->bindparam(':class',$clas);
$stmt->bindparam(':section',$section);

$stmt->execute();


header('location:http://localhost/lakashojt/day_29/admin/showStudent.php?edit=success');
}

?>