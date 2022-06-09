<?php
define("HOST", "localhost");
define("DB_NAME", "school");
define("DB_USER", "root");
define("PASSWORD", "");

try {
    $conn = new PDO('mysql:host=' . HOST . ";dbname=" . DB_NAME, DB_USER, PASSWORD);
} catch (PDOException $e) {
    echo $e->getMessage();
}

$sql = "SELECT * FROM student";
$stmt=$conn->prepare($sql);
$stmt->execute();

$result = $stmt->fetchAll(PDO::FETCH_OBJ);

// print_r($result);
foreach ($result as $student) {
    echo $student->name ."<br>";
}

?>