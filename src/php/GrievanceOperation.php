<?php

class GrievanceOperation {
    private static $servername = "localhost";
    private static $username = "root";
    private static $password = "";
    private static $dbname = "feedback";
    private static $table='grievance';   

    // Establishing database connection
    private static function connect() {
        $conn = new mysqli(GrievanceOperation::$servername, GrievanceOperation::$username, GrievanceOperation::$password, GrievanceOperation::$dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        return $conn;
    }

    // Insert data into ".GrievanceOperation::$table." table
    public static function insertGrievance($roll,$topic, $msg, $subject, $date) {
        $conn = GrievanceOperation::connect();
        $sql = "INSERT INTO ".GrievanceOperation::$table." (roll, FeedBackMsg,subject,DateTime,topic)
                VALUES ($roll, '$msg', '$subject',STR_TO_DATE('".$date."', '%e-%m-%Y') ,'$topic')";
        if ($conn->query($sql) === TRUE) {
            // echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
    }

    // Update data in ".GrievanceOperation::$table." table
    public static function updateGrievance($roll, $msg, $subject, $date) {
        $conn = GrievanceOperation::connect();
        $sql = "UPDATE ".GrievanceOperation::$table."
                SET msg='$msg', subject='$subject', date='$date'
                WHERE roll='$roll'";
        if ($conn->query($sql) === TRUE) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record: " . $conn->error;
        }
        $conn->close();
    }

    // Delete data from ".GrievanceOperation::$table." table
    public static function deleteGrievance($roll) {
        $conn = GrievanceOperation::connect();
        $sql = "DELETE FROM ".GrievanceOperation::$table." WHERE roll='$roll'";
        if ($conn->query($sql) === TRUE) {
            echo "Record deleted successfully";
        } else {
            echo "Error deleting record: " . $conn->error;
        }
        $conn->close();
    }

    // Select all data from ".GrievanceOperation::$table." table
    public static function selectAllGrievances() {
        $conn = GrievanceOperation::connect();
        $sql = "SELECT * FROM ".GrievanceOperation::$table."";
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


    public static function selectGrievances($roll) {
        $allrecord=array();
        $conn = GrievanceOperation::connect();
        $sql = "SELECT DateTime,topic, FeedBackMsg,subject FROM ".GrievanceOperation::$table." where roll='$roll' order by DateTime desc";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $rowdata=array();
                foreach ($row as $key => $value) {
                    // echo "$key: $value <br>";
                    $rowdata[count($rowdata)]=$value;
                }
                $allrecord[count($allrecord)]=$rowdata;
                // echo "<br>";
                
            }
        } 
        return $allrecord;
        
        $conn->close();
    }
}
?>
