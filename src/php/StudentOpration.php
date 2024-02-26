<?php
class StudentOpration {
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "feedback";
    private $table= "Student";

    // Establishing database connection
    private function connect() {
        $conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        return $conn;
    }

    // Insert data into $this->table table
    public function insertStudent($roll_number, $name, $semester, $branch, $college, $password) {
        $conn = $this->connect();
        $sql = "INSERT INTO $this->table (roll_number, name, semester, branch, college, password)
                VALUES ('$roll_number', '$name', '$semester', '$branch', '$college', '$password')";
        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully<br>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
    }

    // Update data in $this->table table
    public function updateStudent($roll_number, $name, $semester, $branch, $college, $password) {
        $conn = $this->connect();
        $sql = "UPDATE $this->table
                SET name='$name', semester='$semester', branch='$branch', college='$college', password='$password'
                WHERE roll_number='$roll_number'";
        if ($conn->query($sql) === TRUE) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record: " . $conn->error;
        }
        $conn->close();
    }

    // Delete data from $this->table table
    public function deleteStudent($roll_number) {
        $conn = $this->connect();
        $sql = "DELETE FROM $this->table WHERE roll_number='$roll_number'";
        if ($conn->query($sql) === TRUE) {
            echo "Record deleted successfully";
        } else {
            echo "Error deleting record: " . $conn->error;
        }
        $conn->close();
    }


    public function selectStudent($roll_number) {
        $conn = $this->connect();
        $sql = "SELECT * from $this->table WHERE roll_number='$roll_number'";

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

    public function getSemester($roll_number) {
        $conn = $this->connect();
        $sql = "SELECT semester from $this->table WHERE roll_number='$roll_number'";

        $result = $conn->query($sql);

        $conn->close();
        return result;
    }

    public function chkStudent($uname,$password) {
        $conn = $this->connect();
        $sql = "SELECT * from $this->table WHERE roll_number ='$uname' and password='$password';";
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
