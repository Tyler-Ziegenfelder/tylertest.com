<?php



Class DBConnection{
    public mysqli $mysqli;
    public function __construct(){
        $username = "root";
        $password = "password";
        $database = "messages";
        $this->mysqli = new mysqli("localhost", $username, $password, $database);
    }
    public function __destruct()
    {
        $this->mysqli->close();
    }
}
?>