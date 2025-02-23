<?php
ob_start();
//**********************************************************************************************************
//                                          If Logout is clicked
//**********************************************************************************************************
if (isset($_POST['Logout'])) {
    session_start();
    session_destroy();
    echo "<script>alert('Logout Sucessfull')</script>";
    header("Refresh:0");

}

//**********************************************************************************************************
//                                          Including the headers
//**********************************************************************************************************

include __Dir__ . '\common\Navbar.php';

require_once dirname(__FILE__, 2) . '/php/StudentOpration.php';
require_once dirname(__FILE__, 2) . '/php/GrievanceOperation.php';
require_once dirname(__FILE__, 2) . '/php/AdminOpration.php';
require_once dirname(__FILE__, 2) . '/php/SubjectDatabase.php';




//**********************************************************************************************************
//                                         If login button clicked 
//**********************************************************************************************************
function ifLoginPressed()
{
    global $exist_lable_val;
    $exist_lable_val = "none";
    //Get the three value and store it in variable
    $rollno = $_POST["roll"];
    $password = $_POST["password"];
    $user = $_POST["usertype"];

    if ($user == "Student") {
        $isexist = StudentOpration::chkStudent($rollno, $password);
        if ($isexist) {
            session_start();
            $_SESSION["roll"] = $rollno;
            $_SESSION["UserType"] = $user;
            // echo '<meta http-equiv="refresh" content="0; url=Student/Add.php">';
            header('Location: Student/Add.php');
        } else {
            echo "<script>alert('The user does not exists.')</script>";
        }
    } else if ($user == "Admin") {
        $isexist = AdminOpration::chkAdmin($rollno, $password);
        if ($isexist) {
            session_start();
            $_SESSION["roll"] = $rollno;
            $_SESSION["UserType"] = $user;
            // echo '<meta http-equiv="refresh" content="0; url=Admin/ViewAll.php">';
            header('Location: Admin/View.php');
        } else {
            echo "<script>alert('The user does not exists.')</script>";
        }
    }
}

if (isset($_POST['Login-btn'])) {
    ifLoginPressed();
}

//**********************************************************************************************************
//                             If Registeration is doen       
//**********************************************************************************************************
function ifRegisterPressed()
{
    $roll_number = $_POST["roll_number"];
    $name = $_POST["name"];
    $semester = $_POST["semester"];
    $branch = $_POST["branch"];
    $college = $_POST["college"];
    $password = $_POST["password"];
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        StudentOpration::insertStudent($roll_number, $name, $semester, $branch, $college, $password);
    } else {
        echo "Invalid request method";
    }
    echo "<script> alert('" . "Register sucessfull" . "') </script>";
}
if (isset($_POST['RegisterSumbit'])) {
    ifRegisterPressed();
}

?>

<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .outer-flex {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 80vh;
            flex-direction: column;
        }

        .login-form {
            width: 100%;
            max-width: 400px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            margin-top: 25vh;
        }

        @media only screen and (max-width: 600px) {
            form {
                max-width: 700px;
            }

            .login-form {
                border: none;
            }
        }

        #exist-lable {
            display: <?php echo $exist_lable_val; ?>;
        }
    </style>
</head>

<body>
    <div class="outer-flex">
        <form action="./Login.php" method="post" class="login-form">
            <h1 class="ms-auto mb-4" style="margin: auto;width: 50%;padding: 10px;">Sign In</h1>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label me-3">User Type</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="usertype" id="flexRadioDefault1" checked value="Student">
                    <label class="form-check-label" for="flexRadioDefault1">
                        Student
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="usertype" id="flexRadioDefault2" value="Admin">
                    <label class="form-check-label" for="flexRadioDefault2">
                        Admin
                    </label>
                </div>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label mb-2">Roll Number/UserName</label>
                <input type="text" class="form-control" id="roll" name="roll" placeholder="Enter Roll Number" required>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput2" class="form-label">Password </label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password" required>
            </div>

            <div class=" justify-content-center flex-grow-1 pe-1 mt-3" style="display: flex; justify-content: space-between  !important;">
                <a href=".\register.php">
                    <button type="button" class="btn btn-primary">Register</button>
                </a>

                <button type="submit" class="btn btn-primary" name="Login-btn" id="Login-btn">Login</button>
            </div>
        </form>
    </div>
</body>
</html>


<?php
include __Dir__ . '\common\Footer.php';
ob_flush();
?>