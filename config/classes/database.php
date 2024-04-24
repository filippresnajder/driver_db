<?php
class Database {
    private $host = "localhost";
    private $db_name = 'driverbase';
    private $user_name = 'root';
    private $password = '';

    protected function db_connection () {
        try {
        $conn = new PDO("mysql:host=".$this->host.";dbname=".$this->db_name."", $this->user_name, $this->password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
        } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
        }
    }
}
?>