<?php
class StudentOpration {
    private static $servername = "localhost";
    private static $username = "root";
    private static $password = "";
    private static $dbname = "feedback";
    private static $table= "Student";

    // Establishing database connection
    private static function connect() {
        $conn = new mysqli(StudentOpration::$servername, StudentOpration::$username, StudentOpration::$password, StudentOpration::$dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        return $conn;
    }

    // Insert data into ".StudentOpration::$table." table
    public static function insertStudent($roll_number, $name, $semester, $branch, $college, $password) {
        $conn = StudentOpration::connect();
        $sql = "INSERT INTO ".StudentOpration::$table." (roll_number, name, semester, branch, college, password)
                VALUES ('$roll_number', '$name', '$semester', '$branch', '$college', '$password')";
        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully<br>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
    }

    // Update data in ".StudentOpration::$table." table
    public static function updateStudent($roll_number, $name, $semester, $branch, $college, $password) {
        $conn = StudentOpration::connect();
        $sql = "UPDATE ".StudentOpration::$table."
                SET name='$name', semester='$semester', branch='$branch', college='$college', password='$password'
                WHERE roll_number='$roll_number'";
        if ($conn->query($sql) === TRUE) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record: " . $conn->error;
        }
        $conn->close();
    }

    // Delete data from ".StudentOpration::$table." table
    public static function deleteStudent($roll_number) {
        $conn = StudentOpration::connect();
        $sql = "DELETE FROM ".StudentOpration::$table." WHERE roll_number='$roll_number'";
        if ($conn->query($sql) === TRUE) {
            echo "Record deleted successfully";
        } else {
            echo "Error deleting record: " . $conn->error;
        }
        $conn->close();
    }


    public static function selectStudent($roll_number) {
        $conn = StudentOpration::connect();
        $sql = "SELECT * from ".StudentOpration::$table." WHERE roll_number='$roll_number'";

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

    public static function getSemester($roll_number) {
        $conn = StudentOpration::connect();
        $sql = "SELECT semester from ".StudentOpration::$table." WHERE roll_number=$roll_number";

        $result = $conn->query($sql);
        $conn->close();

        while($row = $result->fetch_assoc()) {
            foreach ($row as $key => $value) {
                return $value;
            }
        }
    }

    public static function chkStudent($uname,$password) {
        $conn = StudentOpration::connect();
        $sql = "SELECT * from ".StudentOpration::$table." WHERE roll_number ='$uname' and password='$password';";
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
