<?php
include __Dir__.'\comman\bootstrap.php';
?>

<!DOCTYPE html>
<html lang="en"  data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Information Form</title>
    <style>
            .outer-flex {
            display: flex;
            flex-direction: column;
            align-items:     center;
        }

        form {
            width: 100%;
            max-width: 400px; 
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        label {
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="password"],
        input[type="number"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        input[type="submit"],Button[type="button"]{
            width: 50%;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        @media only screen and (max-width: 600px) {
            form {
                max-width: 300px;
            }
        }
	</style>
</head>
<body>
<div class="outer-flex">
    <h2>Student Information Form</h2>
    <form action="./Login.php" method="post">
        <label for="roll_number">Roll Number:</label><br>
        <input type="number" id="roll_number" name="roll_number" required><br>

        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name"><br>

        <label for="semester">Semester:</label><br>
        <input type="number" id="semester" name="semester"><br>

        <label for="branch">Branch:</label><br>
        <input type="text" id="branch" name="branch"><br>

        <label for="college">College:</label><br>
        <input type="text" id="college" name="college"><br>

        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required>

        <input type="submit" value="Submit" name="RegisterSumbit">
        <a href=".\Login.php" >
            <button type="button" class="btn btn-primary">SignIn</button>
        </a>
    </form>
<div>
</body>
</html>
