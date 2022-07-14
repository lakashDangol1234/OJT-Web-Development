<?php
/*
Table Look: school.users
| uid(PK) | username | email | contact | password | navBarTheme
*/
/*
Table Look : school.studentWithClass
| sid(PK) | name | address | contact | class | section | gender
*/
define("HOST", "localhost");
define("DB_NAME", "school");
define("DB_USER", "root");
define("PASSWORD", "");

try {
    $conn = new PDO('mysql:host=' . HOST . ";dbname=" . DB_NAME, DB_USER, PASSWORD);
} catch (PDOException $e) {
    echo $e->getMessage();
}
?>