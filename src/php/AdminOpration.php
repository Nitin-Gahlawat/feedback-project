<?php

class AdminOpration {
    private static $servername = "localhost";
    private static $username = "root";
    private static $password = "";
    private static $dbname = "feedback";
    private static $table="Admins";
    // Establishing database connection
    private static function  connect() {
        $conn = new mysqli(AdminOpration::$servername, AdminOpration::$username, AdminOpration::$password, AdminOpration::$dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        return $conn;
    }

    // Insert data into ".AdminOpration::$table." table
    public static function  insertAdmin($username, $password) {
        $conn = AdminOpration::connect();
        $sql = "INSERT INTO ".AdminOpration::$table." (username, password)
                VALUES ('$username', '$password')";
        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
    }

    // Update data in ".AdminOpration::$table." table
    public static function  updateAdmin($adminid, $username, $password) {
        $conn = AdminOpration::connect();
        $sql = "UPDATE ".AdminOpration::$table."
                SET username='$username', password='$password'
                WHERE adminid='$adminid'";
        if ($conn->query($sql) === TRUE) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record: " . $conn->error;
        }
        $conn->close();
    }

    // Delete data from ".AdminOpration::$table." table
    public static function  deleteAdmin($adminid) {
        $conn = AdminOpration::connect();
        $sql = "DELETE FROM ".AdminOpration::$table." WHERE adminid='$adminid'";
        if ($conn->query($sql) === TRUE) {
            echo "Record deleted successfully";
        } else {
            echo "Error deleting record: " . $conn->error;
        }
        $conn->close();
    }
    public static function  chkAdmin($uname,$password) {
        $conn = AdminOpration::connect();
        $sql = "SELECT * from ".AdminOpration::$table." WHERE Adminid ='$uname' and password='$password';";
        $result = $conn->query($sql);
        if ($result->num_rows == 1 ) {
            return true;
            // echo "exist";
        } else {
            return false;
            // echo "nononononononon";
        }
        $conn->close();
    }
}
?>
