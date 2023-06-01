<?php
class Connect{    
    public static function getConnection() {
        // Create connection
        $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        // Check connection
        if ($conn->connect_error) { 
            die("Connection failed: " . $conn->connect_error);
            return false;
        } else {
            return $conn;
        }
    }
    public static function getPDOConnection() {
        $conn = new PDO("mysql:host=DB_HOST;dbname=DB_NAME", DB_USER, DB_PASSWORD);
        return $conn;
    }
    
}
