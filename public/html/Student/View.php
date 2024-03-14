<?php
session_start();
include dirname(__FILE__,2).'\comman\bootstrap.php';
require_once dirname(__FILE__,4).'\public\html\components\navbar.php';
require_once dirname(__FILE__,4).'/src/php/StudentOpration.php';
require_once dirname(__FILE__,4).'/src/php/GrievanceOperation.php';
require_once dirname(__FILE__,4).'/src/php/AdminOpration.php';

?>

<style>
.container {
  width: 70vw !important;
  margin: 0 auto;
}

.collapsible {
  color: #444;
  cursor: pointer;
  padding: 18px;
  width: 100%; 
  border: none;
  text-align: left;
  outline: none;
  font-size: 15px;
  border-bottom-right-radius:0px;
  border-bottom-left-radius:0px;
  color:white;
}


.content {
  padding: 0 18px;
  display: none;
  overflow: hidden;
  width: 100%;
  border:2px solid white;
  border-top-left-radius:0px;
  border-top-right-radius:0px;
  border-bottom-right-radius:5px;
  border-bottom-left-radius:5px;
}
</style>
<?php
$test=GrievanceOperation::selectGrievances($_SESSION['roll']);
if(isset($_POST['search'])){
  $test=GrievanceOperation::selectGrievancesFromTo($_SESSION['roll'],$_POST['from'],$_POST['to']);
}
?>
<div class="main-view"  id="View-data" >
  <?php
for ($i=0; $i < count($test); $i++) { 
$j=0;
?>
<div class="container mt-4" >
  <label for="date"><?php 
  if($i!==0 && $test[$i-1][$j]===$test[$i][$j])
  $j++;
  else
    echo $test[$i][$j++];
  ?></label>
  <button class="collapsible btn btn-primary"><?php echo $test[$i][$j++]?></button>
  <div class="content">
      <label for="message" class="mt-2 mb-2">Enter FeedBack</label>
      <textarea class="form-control" id="message" rows="3" placeholder="<?php echo $test[$i][$j++]?>" name="msg" disabled></textarea>
      <label for="message" class="mt-2 mb-2" >Subject</label>
      <input type="text" class="form-control mt-2 mb-2" id="datepicker" name="date" autocomplete="off" placeholder="<?php echo $test[$i][$j++]?>"
      disabled>
      <div class="d-grid gap-2 mt-2 mb-3">
        <button class="btn btn-primary" type="sumbit" name="Adding">Change FeedBack</button>
      </div>
  </div>
</div>
<?php
}
?>
</div>
<script>
  var coll = document.getElementsByClassName("collapsible");
  var i;

  for (i = 0; i < coll.length; i++) {
    coll[i].addEventListener("click", function() {
      this.classList.toggle("active");
      var content = this.nextElementSibling;
      if (content.style.display === "block") {
        content.style.display = "none";
      } else {
        content.style.display = "block";
      }
    });
  }

  </script>