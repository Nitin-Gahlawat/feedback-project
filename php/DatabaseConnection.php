<?php

class DatabaseConnection
{
    private static $servername = "localhost";
    private static $username = "root";
    private static $password = "";
    private static $dbname = "feedback";
    
    //**********************************************************************************************************
    // Establishing database connection
    //**********************************************************************************************************
    static function  connect()
    {
        $conn = new mysqli(DatabaseConnection::$servername, DatabaseConnection::$username, DatabaseConnection::$password, DatabaseConnection::$dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        return $conn;
    }
}
