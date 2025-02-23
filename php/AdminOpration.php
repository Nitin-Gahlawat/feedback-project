<?php

require_once __DIR__ . '\DatabaseConnection.php';
class AdminOpration
{

    private static $table = "Admins";
    //**********************************************************************************************************
    // Insert data into Admins
    //**********************************************************************************************************
    public static function  insertAdmin($username, $password)
    {
        $conn = DatabaseConnection::connect();
        $sql = "INSERT INTO " . AdminOpration::$table . " (username, password)
                VALUES ('$username', '$password')";
        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
    }
    //**********************************************************************************************************
    // Update data in Admins
    //**********************************************************************************************************
    public static function  updateAdmin($adminid, $username, $password)
    {
        $conn = DatabaseConnection::connect();
        $sql = "UPDATE " . AdminOpration::$table . "
                SET username='$username', password='$password'
                WHERE adminid='$adminid'";
        if ($conn->query($sql) === TRUE) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record: " . $conn->error;
        }
        $conn->close();
    }
    //**********************************************************************************************************
    // Delete data from Admins
    //**********************************************************************************************************
    public static function  deleteAdmin($adminid)
    {
        $conn = DatabaseConnection::connect();
        $sql = "DELETE FROM " . AdminOpration::$table . " WHERE adminid='$adminid'";
        if ($conn->query($sql) === TRUE) {
            echo "Record deleted successfully";
        } else {
            echo "Error deleting record: " . $conn->error;
        }
        $conn->close();
    }
    //**********************************************************************************************************
    // Cheack if the Admins avaliable or not
    //**********************************************************************************************************
    public static function  chkAdmin($uname, $password)
    {
        $conn = DatabaseConnection::connect();
        $sql = "SELECT * from " . AdminOpration::$table . " WHERE username ='$uname' and password='$password';";
        echo $sql;
        $result = $conn->query($sql);
        if ($result->num_rows == 1) {
            return true;
        } else {
            return false;
        }
        $conn->close();
    }
}
