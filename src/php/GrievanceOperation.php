<?php

class GrievanceOperation {
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "feedback";
    private $table='grievance';   

    // Establishing database connection
    private function connect() {
        $conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        return $conn;
    }

    // Insert data into $this->table table
    public function insertGrievance($roll,$topic, $msg, $subject, $date) {
        $conn = $this->connect();
        $sql = "INSERT INTO $this->table (roll, FeedBackMsg,subject,DateTime,topic)
                VALUES ($roll, '$msg', '$subject',$date,'$topic')";
        if ($conn->query($sql) === TRUE) {
            // echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
    }

    // Update data in $this->table table
    public function updateGrievance($roll, $msg, $subject, $date) {
        $conn = $this->connect();
        $sql = "UPDATE $this->table
                SET msg='$msg', subject='$subject', date='$date'
                WHERE roll='$roll'";
        if ($conn->query($sql) === TRUE) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record: " . $conn->error;
        }
        $conn->close();
    }

    // Delete data from $this->table table
    public function deleteGrievance($roll) {
        $conn = $this->connect();
        $sql = "DELETE FROM $this->table WHERE roll='$roll'";
        if ($conn->query($sql) === TRUE) {
            echo "Record deleted successfully";
        } else {
            echo "Error deleting record: " . $conn->error;
        }
        $conn->close();
    }

    // Select all data from $this->table table
    public function selectAllGrievances() {
        $conn = $this->connect();
        $sql = "SELECT * FROM $this->table";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                print_r($row);
            }
        } else {
            echo "0 results";
        }
        $conn->close();
    }


    public function selectGrievances($roll) {
        $conn = $this->connect();
        $sql = "SELECT * FROM $this->table where roll='$roll'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                foreach ($row as $key => $value) {
                    echo "$key: $value <br>";
                }
                echo "<br>";
            }
        } else {
            echo "0 results";
        }
        
        $conn->close();
    }
}
?>
