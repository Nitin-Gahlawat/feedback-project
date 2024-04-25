<?php
require_once __DIR__ . '\DatabaseConnection.php';
class StudentOpration
{
    private static $table = "Student";

    //**********************************************************************************************************
    // Insert data into Student
    //**********************************************************************************************************
    public static function insertStudent($roll_number, $name, $semester, $branch, $college, $password)
    {
        $conn = DatabaseConnection::connect();
        $sql = "INSERT INTO " . StudentOpration::$table . " (roll_number, name, semester, branch, college, password)
                VALUES ('$roll_number', '$name', '$semester', '$branch', '$college', '$password')";
        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully<br>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
    }
    
    //**********************************************************************************************************
    // Update data in Student
    //**********************************************************************************************************
    public static function updateStudent($roll_number, $name, $semester, $branch, $college, $password)
    {
        $conn = DatabaseConnection::connect();
        $sql = "UPDATE " . StudentOpration::$table . "
                SET name='$name', semester='$semester', branch='$branch', college='$college', password='$password'
                WHERE roll_number='$roll_number'";
        if ($conn->query($sql) === TRUE) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record: " . $conn->error;
        }
        $conn->close();
    }
    
    //**********************************************************************************************************
    // Delete data from Student
    //**********************************************************************************************************
    public static function deleteStudent($roll_number)
    {
        $conn = DatabaseConnection::connect();
        $sql = "DELETE FROM " . StudentOpration::$table . " WHERE roll_number='$roll_number'";
        if ($conn->query($sql) === TRUE) {
            echo "Record deleted successfully";
        } else {
            echo "Error deleting record: " . $conn->error;
        }
        $conn->close();
    }

    //**********************************************************************************************************
    // Selecting data from Student
    //**********************************************************************************************************
    public static function selectStudent($roll_number)
    {
        $conn = DatabaseConnection::connect();
        $sql = "SELECT * from " . StudentOpration::$table . " WHERE roll_number='$roll_number'";

        $result = $conn->query($sql);
        $rowdata = array();
        if ($result->num_rows == 1) {
            while ($row = $result->fetch_assoc()) {
                foreach ($row as $key => $value) {
                    //count($rowdata) return row data +1 hence it is used for insert
                    $rowdata[count($rowdata)] = $value;
                }
            }
        }
        $conn->close();
        return $rowdata;
    }

    //**********************************************************************************************************
    // selecting the rollnumber based on the semester
    //**********************************************************************************************************
    public static function getSemester($roll_number)
    {
        $conn = DatabaseConnection::connect();
        $sql = "SELECT semester from " . StudentOpration::$table . " WHERE roll_number=$roll_number";

        $result = $conn->query($sql);
        $conn->close();

        while ($row = $result->fetch_assoc()) {
            foreach ($row as $key => $value) {
                return $value;
            }
        }
    }

    //**********************************************************************************************************
    // Cheacking if the student exist
    //**********************************************************************************************************
    public static function chkStudent($uname, $password)
    {
        $conn = DatabaseConnection::connect();
        $sql = "SELECT * from " . StudentOpration::$table . " WHERE roll_number ='$uname' and password='$password';";
        $result = $conn->query($sql);
        if ($result->num_rows == 1) {
            return true;
        } else {
            return false;
        }
        $conn->close();
    }
}
