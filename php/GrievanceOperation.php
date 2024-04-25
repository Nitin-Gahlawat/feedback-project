<?php
require_once __DIR__ . '\DatabaseConnection.php';
class GrievanceOperation
{
    private static $table = 'grievance';

    //**********************************************************************************************************
    // Insert data into grievance
    //**********************************************************************************************************
    public static function insertGrievance($roll, $topic, $msg, $subject, $date)
    {
        $conn = DatabaseConnection::connect();
        $sql = "INSERT INTO " . GrievanceOperation::$table . " (roll, FeedBackMsg,subject,DateTime,topic)
                VALUES ($roll, '$msg', '$subject',STR_TO_DATE('" . $date . "', '%e-%m-%Y') ,'$topic')";
        if ($conn->query($sql) === TRUE) {
            // echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
    }

    //**********************************************************************************************************
    // Insert data into grievance
    //**********************************************************************************************************
    public static function insertGrievanceNew($roll, $topic, $msg, $subject, $date, $type, $rate)
    {
        $conn = DatabaseConnection::connect();
        $sql = "INSERT INTO " . GrievanceOperation::$table . " (roll, FeedBackMsg,subject,DateTime,topic,type,rate)
                    VALUES ($roll, '$msg', '$subject',STR_TO_DATE('" . $date . "', '%e-%m-%Y') ,'$topic','$type','$rate')";
        if ($conn->query($sql) === TRUE) {
            // echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
    }
    //**********************************************************************************************************
    // Update data in grievance
    //**********************************************************************************************************
    public static function updateGrievance($roll, $msg, $subject, $date)
    {
        $conn = DatabaseConnection::connect();
        $sql = "UPDATE " . GrievanceOperation::$table . "
                SET msg='$msg', subject='$subject', date='$date'
                WHERE roll='$roll'";
        if ($conn->query($sql) === TRUE) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record: " . $conn->error;
        }
        $conn->close();
    }
    //**********************************************************************************************************
    // Delete data from grievance
    //**********************************************************************************************************
    public static function deleteGrievance($roll)
    {
        $conn = DatabaseConnection::connect();
        $sql = "DELETE FROM " . GrievanceOperation::$table . " WHERE roll='$roll'";
        if ($conn->query($sql) === TRUE) {
            echo "Record deleted successfully";
        } else {
            echo "Error deleting record: " . $conn->error;
        }
        $conn->close();
    }
    //**********************************************************************************************************
    // Select all data from grievance
    //**********************************************************************************************************
    public static function selectAllGrievances()
    {
        $conn = DatabaseConnection::connect();
        $sql = "SELECT * FROM " . GrievanceOperation::$table . "";
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

    //**********************************************************************************************************
    // Select all data from grievance
    //**********************************************************************************************************
    public static function selectGrievances($roll)
    {
        $allrecord = array();
        $conn = DatabaseConnection::connect();
        $sql = "SELECT DateTime,topic, FeedBackMsg,subject FROM " . GrievanceOperation::$table . " where roll='$roll' order by DateTime desc";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $rowdata = array();
                foreach ($row as $key => $value) {
                    //count($rowdata) return row data +1 hence it is used for insert
                    $rowdata[count($rowdata)] = $value;
                }
                $allrecord[count($allrecord)] = $rowdata;
            }
        }
        $conn->close();
        return $allrecord;
    }
    //**********************************************************************************************************
    // Select all data from grievance
    //**********************************************************************************************************
    public static function selectGrievancesFromTo($roll, $from, $to)
    {
        $allrecord = array();
        $conn = DatabaseConnection::connect();
        $sql = "SELECT *
        FROM grievance
        WHERE roll=" . $roll . " AND DateTime BETWEEN STR_TO_DATE('" . $from . "', '%d-%m-%Y') AND STR_TO_DATE('" . $to . "', '%d-%m-%Y');
        ";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $rowdata = array();
                foreach ($row as $key => $value) {
                    //count($rowdata) return row data +1 hence it is used for insert
                    $rowdata[count($rowdata)] = $value;
                }
                $allrecord[count($allrecord)] = $rowdata;
            }
        }
        $conn->close();
        return $allrecord;
    }
    //**********************************************************************************************************
    // Select all data from grievance
    //**********************************************************************************************************
    public static function selectselectedcolGrievancesFromTo($roll, $from, $to)
    {
        $allrecord = array();
        $conn = DatabaseConnection::connect();
        $sql = "SELECT `type`,`topic`,`Subject`,`rate`,`DateTime`,`FeedBackMsg`
        FROM grievance
        WHERE roll=" . $roll . " AND DateTime BETWEEN STR_TO_DATE('" . $from . "', '%d-%m-%Y') AND STR_TO_DATE('" . $to . "', '%d-%m-%Y');
        ";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $rowdata = array();
                foreach ($row as $key => $value) {
                    //count($rowdata) return row data +1 hence it is used for insert
                    $rowdata[count($rowdata)] = $value;
                }
                $allrecord[count($allrecord)] = $rowdata;
            }
        }
        $conn->close();
        return $allrecord;
    }

    //**********************************************************************************************************
    // Select all data from grievance
    //**********************************************************************************************************
    public static function selectAll()
    {
        $allrecord = array();
        $conn = DatabaseConnection::connect();
        $sql = "SELECT * FROM " . GrievanceOperation::$table;;
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $rowdata = array();
                foreach ($row as $key => $value) {
                    //count($rowdata) return row data +1 hence it is used for insert
                    $rowdata[count($rowdata)] = $value;
                }
                $allrecord[count($allrecord)] = $rowdata;
            }
        }
        $conn->close();
        return $allrecord;
    }
    //**********************************************************************************************************
    // Select all data from grievance
    //**********************************************************************************************************
    public static function AdminFromTo($from, $to)
    {
        $allrecord = array();
        $conn = DatabaseConnection::connect();
        $sql = "SELECT `roll`,`type`,`topic`,`Subject`,`rate`,`DateTime`,`FeedBackMsg`
        FROM grievance where DateTime BETWEEN STR_TO_DATE('" . $from . "', '%d-%m-%Y') AND STR_TO_DATE('" . $to . "', '%d-%m-%Y');
        ";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $rowdata = array();
                foreach ($row as $key => $value) {
                    //count($rowdata) return row data +1 hence it is used for insert
                    $rowdata[count($rowdata)] = $value;
                }
                $allrecord[count($allrecord)] = $rowdata;
            }
        }
        $conn->close();
        return $allrecord;
    }
}
