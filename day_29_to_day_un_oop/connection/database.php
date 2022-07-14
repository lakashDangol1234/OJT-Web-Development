<?php
class Database{
    private $HOST;
    private $DB_NAME;
    private $DB_USER;
    private $PASSWORD;

    function __construct(){
        try {
            $conn = new PDO('mysql:host=' . $this->HOST . ";dbname=" . $this->DB_NAME, $this->DB_USER, $this->PASSWORD);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}
?>