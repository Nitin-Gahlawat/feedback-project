<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>  

<?php
session_start();
include dirname(__FILE__,2).'\comman\bootstrap.php';

require_once dirname(__FILE__,4).'\public\html\components\navbar.php';
require_once dirname(__FILE__,4).'/src/php/StudentOpration.php';
require_once dirname(__FILE__,4).'/src/php/GrievanceOperation.php';
require_once dirname(__FILE__,4).'/src/php/AdminOpration.php';
require_once dirname(__FILE__,4).'/src/php/SubjectDatabase.php';
?>
<?php
 if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['Adding'])){
  $roll=$_SESSION["roll"];
  $subject=$_POST['subject-dropdown'];
  $date=$_POST['date'];
  $topic=$_POST['topic'];
  $msg=$_POST['msg'];
  $date=$_POST["date"];
  GrievanceOperation::insertGrievance($roll,$topic, $msg, $subject, $date);
  echo "<script> alert('"."FeedBack Added sucessfully"."') </script>";
}



$rollint=$_SESSION['roll'];
$res=SubjectDatabase::getAllSubjects(StudentOpration::getSemester($rollint));
?>
<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
<style>
 .form-group{
    padding: 1.2rem;
  }
  .AddSideBox{
    border: 2px solid white;
    border-radius: 1.3rem;
  }
  label{
    margin-bottom:.5rem;

}
    
</style>

<div class="container mt-5" id="Add-form">
  <div class="row">
    <div class="col-md-6 offset-md-3">
      <form action="./Add.php" method="post" class="AddSideBox" id="AddSideBox">

      <div class="form-group">
          <label for="topic">Enter topic</label>
          <input type="text" class="form-control" id="topic"  placeholder="Enter your topic" name="topic" autocomplete="off"></input>
        </div>

        <div class="form-group">
          <label for="message">Enter FeedBack</label>
          <textarea class="form-control" id="message" rows="3" placeholder="Enter your message" name="msg"></textarea>
        </div>
        <div class="form-group">
          <label for="date">Date Of FeedBack</label>
          <input type="text" class="form-control" id="datepicker" name="date" autocomplete="off" placeholder="DD-MM-YYYY" readonly>
        </div>
        <div class="form-group">
          <label for="dropdown">Subject</label>
          <select class="form-control" id="dropdown" name="subject-dropdown">
            <?php
              for ($i=0; $i < count($res); $i++) { 
                echo "<option value=".$res[$i].">".$res[$i]."</option>";  
              }

            ?>
          </select>
        </div>
        <div class="form-group">
          <div class="d-grid gap-2">
            <button class="btn btn-primary" type="sumbit" name="Adding">Add Feedback</button>
          </div>
        </div >
      </form>
    </div>
  </div>
</div> 
</body>
</html>



  <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
  <script>

  $( function() {
    $( "#datepicker" ).datepicker({ minDate: "-7D",
      maxDate: new Date() ,
      dateFormat: "dd-mm-yy"
    });
  } );
  </script>