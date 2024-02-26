<?php
session_start();
include dirname(__FILE__,2).'\comman\bootstrap.php';

require_once dirname(__FILE__,4).'/src/php/StudentOpration.php';
require_once dirname(__FILE__,4).'/src/php/GrievanceOperation.php';
require_once dirname(__FILE__,4).'/src/php/AdminOpration.php';

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
?>




<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>

  <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand" href="#"><img src="../comman/logo.jpg" alt="logo" width="200" hight="200"></a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#" id="ADD" >Add</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#" id="Update">Update</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#" id="View">View Status</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#" id="History">History</a>
          </li>
        </ul>
        
      </div>
    </div>
  </nav>

  
  <?php
  require_once "./Add.php";
  // require_once "./View.php";
  // require_once "./Update.php";
  // require_once "./History.php"
  ?>

</body>
  <script>


            let ADD = document.getElementById("ADD");
            let ADD_form = document.getElementById("Add-form");


            // let View = document.getElementById("View");
            // let View_data = document.getElementById("View-data");

            // let Update = document.getElementById("Update");
            // let Update_data = document.getElementById("update_page");

            // let History = document.getElementById("History");
            // let History_page = document.getElementById("History_page");



            ADD_form.style.display="block";
            // Update_data.style.display="none";
            // View_data.style.display="none";
            // History_page.style.display="none";

            
            ADD.addEventListener("click", ()=> {
              ADD_form.style.display="block";
              // Update_data.style.display="none";
              // View_data.style.display="none";
              // History_page.style.display="none";
            });

            // Update.addEventListener("click", ()=> {
            //   ADD_form.style.display="none";
            //   Update_data.style.display="block";
            //   View_data.style.display="none";
            //   History_page.style.display="none";
            // });

            // View.addEventListener("click", ()=> {
            //   ADD_form.style.display="none";
            //   Update_data.style.display="none";
            //   View_data.style.display="block";
            //   History_page.style.display="none";
            // });

            // History.addEventListener("click", ()=> {
            //   ADD_form.style.display="none";
            //   Update_data.style.display="none";
            //   View_data.style.display="none";
            //   History_page.style.display="block";

            // });

            
    </script>
</html>



<?php
        // session_start();
        
        // $ob=new GrievanceOperation();
        // $ob->selectGrievances( $_SESSION["rollnum"]);
?>