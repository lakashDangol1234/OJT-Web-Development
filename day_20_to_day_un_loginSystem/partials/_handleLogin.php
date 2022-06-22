<?php
include "../connection/dbconn.php";
if(isset($_POST['login'])){
    $name=$_POST['username'];
    $pwd=$_POST['password'];
    echo $name . " ".$pwd;
}
?>