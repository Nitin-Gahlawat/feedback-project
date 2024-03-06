<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>  

<?php
include dirname(__FILE__,2).'\comman\bootstrap.php';

require_once dirname(__FILE__,4).'/src/php/StudentOpration.php';
require_once dirname(__FILE__,4).'/src/php/GrievanceOperation.php';
require_once dirname(__FILE__,4).'/src/php/AdminOpration.php';
require_once dirname(__FILE__,4).'/src/php/SubjectDatabase.php';
?>
<?php




$rollint=$_SESSION['roll'];
$res=SubjectDatabase::getAllSubjects(StudentOpration::getSemester($rollint));
?>

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

<div class="container mt-5" id="Add-form" Style="display:none;">
  <div class="row">
    <div class="col-md-6 offset-md-3">
      <form action="./index.php" method="post" class="AddSideBox">

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