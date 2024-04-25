<?php
session_start();
include dirname(__FILE__, 2) . '\common\Navbar.php';
require_once dirname(__FILE__, 3) . '/php/StudentOpration.php';
require_once dirname(__FILE__, 3) . '/php/GrievanceOperation.php';
require_once dirname(__FILE__, 3) . '/php/AdminOpration.php';
require_once dirname(__FILE__, 3) . '/php/SubjectDatabase.php';
function profileUpdate()
{
    $name = $_POST["name"];
    $semester = $_POST["semester"];
    $branch = $_POST["branch"];
    $college = $_POST["college"];
    $password = $_POST["password"];
    StudentOpration::updateStudent($_SESSION['roll'], $name, $semester, $branch, $college, $password);
    echo "<script> alert('" . "Updated sucessfull" . "') </script>";
}
if (isset($_POST["ChangeProfile"])) {
    profileUpdate();
}
$studentdata = StudentOpration::selectStudent($_SESSION['roll']);
?>




<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile </title>
    <style>
        .outer-flex {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .Register-form {
            width: 100%;
            max-width: 400px;
            padding: 18px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            margin-top: 13.5vh;
        }

        label {
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="password"],
        input[type="number"] {
            width: 100%;
            padding: 5px;
            margin-bottom: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        #LoginBtn {
            padding: 10px;
            margin-bottom: 2px;
            margin-top: 3px;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        @media only screen and (max-width: 600px) {
            form {
                max-width: 300px;
            }

            .Register-form {
                border: none;
            }
        }
    </style>
</head>

<body>
    <div class="outer-flex">
        <form action="./Profile.php" method="post" class="Register-form">
            <h2 style="font-size: 31px;">Update Profile</h2>
            <label for="roll_number">Roll Number:</label><br>
            <input type="number" id="roll_number" name="roll_number" value="<?php echo $studentdata[0] ?>" disabled><br>

            <label for="name">Name:</label><br>
            <input type="text" id="name" name="name" value="<?php echo $studentdata[1] ?>"><br>

            <label for="semester">Semester:</label><br>
            <input type="number" id="semester" name="semester" value="<?php echo $studentdata[2] ?>"><br>

            <label for="branch">Branch:</label><br>
            <input type="text" id="branch" name="branch" value="<?php echo $studentdata[3] ?>"><br>

            <label for="college">College:</label><br>
            <input type="text" id="college" name="college" value="<?php echo $studentdata[4] ?>"><br>

            <label for="password">Password:</label><br>
            <input type="password" id="password" name="password" value="<?php echo $studentdata[5] ?>">


            <input type="submit" class="btn btn-primary" value="Change profile" name="ChangeProfile" style="width: 100%;">
        </form>
        <div>
</body>

</html>