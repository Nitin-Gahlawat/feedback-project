<?php
session_start();
include dirname(__FILE__,2).'\comman\bootstrap.php';
require_once dirname(__FILE__,4).'\public\html\components\navbar.php';
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
   
  <?php
  require_once "./Add.php";
   require_once "./View.php";
  // require_once "./Update.php";
  // require_once "./History.php"
  ?>

</body>
  <script>
      function setActive(tab) {
            const TabsData={
                //Tabs(or FileName):formElement (for displaying the data)
                "ADD":"Add-form",
                "View":"View-data",
              }
              for (let key in TabsData) {
                if(tab==key){
                  //Adding the tab active
                  let e1=document.getElementById(key);
                  
                  e1.classList.add('btn-primary');
                  //Displaying the data
                  document.getElementById(TabsData[key]).style.display="block";
                }
                else{
                  //Removing the Active Status of Other Elements
                    let e1=document.getElementById(key);
                    e1.classList.remove("btn-primary");
                    //Hiding the data of the other tabs.
                    document.getElementById(TabsData[key]).style.display="none";
                }

              }
                
          }

            //Initial call to set the "ADD" Button as the Active.
            setActive("ADD");

            document.getElementById("ADD").addEventListener("click", ()=> {
              setActive("ADD");
            });
            document.getElementById("View").addEventListener("click", ()=> {
              setActive("View");
            });
    </script>
</html>

