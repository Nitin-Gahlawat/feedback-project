<?php

class SubjectDatabase {
    private static $servername = "localhost";
    private static $username = "root";
    private static $password = "";
    private static $dbname = "feedback";
    private static $table= "subject";

    private static function connect() {
        $conn = new mysqli(SubjectDatabase::$servername, SubjectDatabase::$username, SubjectDatabase::$password, SubjectDatabase::$dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        return $conn;
    }

    public static function insertSubject(int $semester, $subjectName) {
        $conn=SubjectDatabase::connect();

        $sql = "INSERT INTO ".SubjectDatabase::$table." (semester, subject_name) VALUES ('$semester', '$subjectName')";
        $result = $conn->query($sql);
        $conn->close();
        return $result;
    }

    public static function deleteSubject(int $semester, $subjectName) {
        $conn=SubjectDatabase::connect();

        $sql = "DELETE FROM ".SubjectDatabase::$table." WHERE semester = '$semester' AND subject_name = '$subjectName'";
        $result = $conn->query($sql);
        $conn->close();
        return $result;
    }

    public static function updateSubject(int $semester, $oldSubjectName, $newSubjectName) {
        $conn=SubjectDatabase::connect();

        $sql = "UPDATE ".SubjectDatabase::$table." SET subject_name = '$newSubjectName' WHERE semester = '$semester' AND subject_name = '$oldSubjectName'";
        $result = $conn->query($sql);
        $conn->close();
        return $result;
    }

    public static function getAllSubjects($semester) {
        $conn=SubjectDatabase::connect();
        $sql="SELECT * FROM subject WHERE semester ='".$semester."'";
        $result = $conn->query($sql);

        $subjects = [];
        while ($row = $result->fetch_assoc()) {
            $subjects[] = $row['subject_name'];
        }
        $conn->close();
        return $subjects;
    }
}

?>
