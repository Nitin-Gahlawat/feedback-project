<?php
require_once __DIR__ . '\DatabaseConnection.php';
class SubjectDatabase
{
    private static $table = "subject";

    //**********************************************************************************************************
    // Insertion of a Subject
    //**********************************************************************************************************
    public static function insertSubject(int $semester, $subjectName)
    {
        $conn = DatabaseConnection::connect();

        $sql = "INSERT INTO " . SubjectDatabase::$table . " (semester, subject_name) VALUES ('$semester', '$subjectName')";
        $result = $conn->query($sql);
        $conn->close();
        return $result;
    }

    //**********************************************************************************************************
    // Deletion of a subject
    //**********************************************************************************************************
    public static function deleteSubject(int $semester, $subjectName)
    {
        $conn = DatabaseConnection::connect();

        $sql = "DELETE FROM " . SubjectDatabase::$table . " WHERE semester = '$semester' AND subject_name = '$subjectName'";
        $result = $conn->query($sql);
        $conn->close();
        return $result;
    }
    //**********************************************************************************************************
    // Updating subject data
    //**********************************************************************************************************

    public static function updateSubject(int $semester, $oldSubjectName, $newSubjectName)
    {
        $conn = DatabaseConnection::connect();

        $sql = "UPDATE " . SubjectDatabase::$table . " SET subject_name = '$newSubjectName' WHERE semester = '$semester' AND subject_name = '$oldSubjectName'";
        $result = $conn->query($sql);
        $conn->close();
        return $result;
    }

    //**********************************************************************************************************
    // Selecting all the subjects based on a semester given
    //**********************************************************************************************************
    public static function getAllSubjects($semester)
    {
        $conn = DatabaseConnection::connect();
        $sql = "SELECT * FROM subject WHERE semester ='" . $semester . "'";
        $result = $conn->query($sql);

        $subjects = [];
        while ($row = $result->fetch_assoc()) {
            $subjects[] = $row['subject_name'];
        }
        $conn->close();
        return $subjects;
    }
}
