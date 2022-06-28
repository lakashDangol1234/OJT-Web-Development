<?php
include "../connection/dbconn.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    /* Get content type */
    $contentType = trim($_SERVER["CONTENT_TYPE"] ?? '');

    /* Receive the RAW post data. */
    $content = trim(file_get_contents("php://input"));
    $data=json_decode($content,true);
    $username = $data['username'];
    $navbarColor = $data['navBarTheme'];

    $sql = "UPDATE `users` SET `navBarTheme` = '$navbarColor' WHERE `username` = :uName";

    $stmt = $conn->prepare($sql);
    $stmt->bindparam(':uName', $username);

    $stmt->execute();
    session_start();
    $_SESSION['navbarTheme']=$navbarColor;
    echo "Ok";
}
