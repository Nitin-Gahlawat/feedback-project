<?php
session_start();
include dirname(__FILE__,2).'\comman\bootstrap.php';
require_once dirname(__FILE__,4).'\public\html\components\navbar.php';
require_once dirname(__FILE__,4).'/src/php/StudentOpration.php';
require_once dirname(__FILE__,4).'/src/php/GrievanceOperation.php';
require_once dirname(__FILE__,4).'/src/php/AdminOpration.php';

?>
<style>
#search-data {
  width: 70vw;
  margin: 0 auto;
}
</style>

<div id="search-data" class="mt-4">
  <form action="./View.php" method="post" class="login-form">
      <label for="date">From</label>
      <input type="text" class="form-control" id="datepicker1" name="from" autocomplete="off" placeholder="DD-MM-YYYY" value="24-02-2024" readonly>
      <label for="date">To</label>
      <input type="text" class="form-control" id="datepicker2" name="to" autocomplete="off" placeholder="DD-MM-YYYY"  value="29-02-2024" readonly>
      <button class="btn btn-primary mt-3" type="sumbit" name="search">search Feedback</button>
  </form>
</div>
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
  <script>


$( function() {
    $( "#datepicker1" ).datepicker({
      maxDate: new Date() ,
      dateFormat: "dd-mm-yy"
    });
  } );
  $( function() {
    $( "#datepicker2" ).datepicker({
      maxDate: new Date() ,
      dateFormat: "dd-mm-yy"
    });
  } );
</script>