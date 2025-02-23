<?php

include __Dir__ . '\common\Navbar.php';
?>




<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registation Form</title>
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
            margin-top: 13vh;
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
            background:RGB(33,37,41);
        }

        #LoginBtn{
            padding: 10px;
            margin-bottom: 2px;
            margin-top: 3px;
            border-radius: 5px;
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
        <form action="./Login.php" method="post" class="Register-form">
            <h2 style="font-size: 31px;">Student Registation Form</h2>
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

            <div class="SumbitAndLogin" style="display: flex; justify-content: space-between; ">
                <a href=".\Login.php">
                    <button type="button" class="btn btn-primary" style="width: 20vh;" id="LoginBtn">Login</button>
                </a>
                <input type="submit" class="btn btn-primary" value="Submit" id="RegisterSumbit" name="RegisterSumbit" style="width: 20vh;">
            </div>
        </form>
        <div>
</body>

</html>