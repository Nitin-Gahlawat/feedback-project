 <!--included php files   -->

 <?php
include __Dir__.'\comman\bootstrap.php';
require_once dirname(__FILE__,3).'/src/php/StudentOpration.php';
require_once dirname(__FILE__,3).'/src/php/GrievanceOperation.php';
require_once dirname(__FILE__,3).'/src/php/AdminOpration.php';


?>
 
 <?php

   // if the data is registed by the students
    if(isset($_POST['RegisterSumbit'])){
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
      echo "<script> alert('"."Register sucessfull"."') </script>";
      // $ob->selectStudent($roll_number);
    }

    // if the data is logined by the students/Admin.
      $exist_lable_val="none";

      if(isset($_POST['Login-btn'])){


          $rollno = $_POST["rollnum"];
          $password = $_POST["password"];
          $user=$_POST["TypesUser"];


          if($user=="Students"){
              $ob=new StudentOpration();
              $isexist=$ob->chkStudent($rollno,$password);
              if($isexist){
                  echo "student exist";
                  header("Location: Student/index.php"); 
              }
              else{
                  echo "user not avaliable";
                  $exist_lable_val="block";
                  // header("Location: Login.php"); 
              }
              
              session_start();
              $_SESSION["roll"] = $rollno;
              $_SESSION["UserType"]= $user;
          }
          else if($user=="Admin"){
              $ob=new AdminOpration();
              $isexist=$ob->chkAdmin($rollno,$password);
              if($isexist){
                  echo "Admin exist";
              }
              else{
                  echo "Admin not avaliable";
                  $exist_lable_val="block";
                  //header("Location: Login.php"); 
              }
              
              session_start();
              $_SESSION["rollnum"] = $rollno;
              $_SESSION["UserType"]= $user;
          }
          else{
              echo "incorrect";
              $exist_lable_val="block";
              // header("Location: Login.php"); 
          }
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
            height: 100vh;
            flex-direction: column;
        }

        form {
            width: 100%;
            max-width: 400px; /* Adjust as needed */
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        @media only screen and (max-width: 600px) {
            form {
                max-width: 300px; /* Adjust as needed */
            }
        }

        #exist-lable{
          display:<?php echo $exist_lable_val; ?>;
        }
        
      </style>
    </head>

<body>
  <div class="outer-flex">
    <h1>Sign in</h1>
    <form action="./Login.php" method="post">
    
    <!-- <div class="mb-2">
    <label for="exampleFormControlInput1" class="form-label">User Type</label>
    <div class="btn-group">
      <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
        Student
      </button>
      <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="#">Student</a></li>
        <li><a class="dropdown-item" href="#">Admin</a></li>
      </ul>
    </div>
      </div> -->

      <label for="exampleFormControlInput1" class="form-label">Enter User Type</label>
      <select name="TypesUser" id="TypesUser">
        <option value="Students">Students</option>
        <option value="Admin">Admin</option>
      </select>

      <div class="mb-2">
        <label for="exampleFormControlInput1" class="form-label">Roll Number</label>
        <input type="number" class="form-control" id="rollnum" name="rollnum" placeholder="Enter Roll Number" required>
      </div>
      <div class="mb-2">
        <label for="exampleFormControlInput2" class="form-label">Password </label>
        <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password" required>
      </div>

      <button type="submit" class="btn btn-primary" name="Login-btn" id="Login-btn">Login</button>
      
      <a href=".\register.php">
        <button type="button" class="btn btn-primary">SignUp</button>
      </a>

        <br>

      <label for="exampleFormControlInput2" class="form-label" id="exist-lable">The user does not exists. </label>
      
    </form>
  </div>
</body>

</html>