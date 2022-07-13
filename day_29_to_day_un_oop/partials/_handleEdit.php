<?php
include "../connection/dbconn.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$sid= $_POST['editSid'];
$name=$_POST['editName'];
$address=$_POST['editAddress'];
$contact=$_POST['editContact'];
$clas=$_POST['editClass'];
$section=$_POST['editSection'];
$gender=$_POST['editGender'];

$sql="UPDATE `studentWithClass` SET `name`=:name,`address`=:address,`contact`=:contact,`class`=:class,`section`=:section,`gender`=:gender WHERE `sid` = :id";


$stmt=$conn->prepare($sql);
$stmt->bindparam(':name',$name);
$stmt->bindparam(':address',$address);
$stmt->bindparam(':contact',$contact);
$stmt->bindparam(':id',$sid);
$stmt->bindparam(':class',$clas);
$stmt->bindparam(':section',$section);
$stmt->bindparam(':gender',$gender);

$stmt->execute();


header('location:http://localhost/lakashojt/day_29_to_day_un_oop/admin/showStudent.php?edit=success');
}

?>