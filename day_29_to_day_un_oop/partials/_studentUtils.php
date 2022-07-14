<?php
class Student{
    function __construct(){
        
    }
    function display(){

    }
    function insert(){

    }
}




class Teacher extends Student{
    function show(){
        echo "You are in Teacher class show function";
    }
}


$obj=new Teacher();
// $obj->show();

function addStudent($name,$address,$contact,$clas,$section,$gender){
    global $conn;
    $sql = "INSERT INTO `studentWithClass` (`name`, `address`, `contact`,`class`,`section`,`gender`) VALUES ('$name', '$address', '$contact','$clas','$section','$gender')";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
}
?>