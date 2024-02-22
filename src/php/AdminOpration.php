<?php

class AdminOpration {
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "feedback";
    private $table="Admins";
    // Establishing database connection
    private function connect() {
        $conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        return $conn;
    }

    // Insert data into $this->table table
    public function insertAdmin($username, $password) {
        $conn = $this->connect();
        $sql = "INSERT INTO $this->table (username, password)
                VALUES ('$username', '$password')";
        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
    }

    // Update data in $this->table table
    public function updateAdmin($adminid, $username, $password) {
        $conn = $this->connect();
        $sql = "UPDATE $this->table
                SET username='$username', password='$password'
                WHERE adminid='$adminid'";
        if ($conn->query($sql) === TRUE) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record: " . $conn->error;
        }
        $conn->close();
    }

    // Delete data from $this->table table
    public function deleteAdmin($adminid) {
        $conn = $this->connect();
        $sql = "DELETE FROM $this->table WHERE adminid='$adminid'";
        if ($conn->query($sql) === TRUE) {
            echo "Record deleted successfully";
        } else {
            echo "Error deleting record: " . $conn->error;
        }
        $conn->close();
    }
    public function chkAdmin($uname,$password) {
        $conn = $this->connect();
        $sql = "SELECT * from $this->table WHERE Adminid ='$uname' and password='$password';";
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
