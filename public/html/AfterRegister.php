<?php
    require_once dirname(__FILE__,3).'/src/php/StudentOpration.php';
    $ob=new StudentOpration();

    $roll_number = $_POST["roll_number"];
    $name = $_POST["name"];
    $semester = $_POST["semester"];
    $branch = $_POST["branch"];
    $college = $_POST["college"];
    $password = $_POST["password"];
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $ob->insertStudent($roll_number, $name, $semester, $branch, $college, $password);
    } else {
        echo "Invalid request method";
    }
    $ob->selectStudent($roll_number);

    
    header("Location: Login.php");
    exit();
?>
