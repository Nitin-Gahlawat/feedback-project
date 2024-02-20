 <?php
include __Dir__.'\comman\bootstrap.php';
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
      </style>
    </head>

<body>
  <div class="outer-flex">
    <h1>Sign in</h1>
    <form action="./AfterLogin.php" method="post">
    
    <div class="mb-2">
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
      </div>

      <div class="mb-2">
        <label for="exampleFormControlInput1" class="form-label">Roll Number</label>
        <input type="number" class="form-control" id="rollnum" name="rollnum" placeholder="Enter Roll Number" required>
      </div>
      <div class="mb-2">
        <label for="exampleFormControlInput2" class="form-label">Password </label>
        <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password" required>
      </div>
      <button type="submit" class="btn btn-primary">Login</button>
      
      <a href=".\register.php">
        <button type="button" class="btn btn-primary">SignUp</button>
      </a>
    </form>

  </div>
</body>

</html>