<?php
session_start();
include dirname(__FILE__, 2) . '\common\Navbar.php';
require_once dirname(__FILE__, 3) . '/php/StudentOpration.php';
require_once dirname(__FILE__, 3) . '/php/GrievanceOperation.php';
require_once dirname(__FILE__, 3) . '/php/AdminOpration.php';
require_once dirname(__FILE__, 3) . '/php/SubjectDatabase.php';
?>

<link rel="stylesheet" href="https://cdn.datatables.net/2.0.3/css/dataTables.dataTables.css" />
<script src="https://cdn.datatables.net/2.0.3/js/dataTables.js"></script>

<!DOCTYPE html>
<html data-bs-theme="dark">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        .cont {
            justify-content: center;
            width: 90vw;
            padding: 5vh;
            margin: 10vh;
            margin-top: 15vh;
            overflow: auto;
            border: 2px solid wheat;
            border-radius: .5rem;

        }

        .heading {
            display: flex;
            justify-content: center;
            padding: 2px;
        }

        label,
        .form-control {
            margin: 1.5vh;
            width: 100%;
        }

        #date-label {
            font-size: 3vh;
            margin-block: 5vh;

            margin-left: 1vw;
        }
        #myTable{
            margin-bottom: 3vh;
            width:fit-content;
            height:fit-content;
        }
        @media only screen and (max-width:990px) {
            .cont{
                border: none;
                margin: 0vh;
                margin-top: 15vh;
            }
        }
    </style>
</head>

<body>

    <div class="cont">
        <div class="heading">
            <h1 style="font-size: 30px;">Search Feedback</h1>
        </div>
        <div class="form-group">
            <label for="topic" style="font-size: 17px;">Enter From date</label>
            <input type="text" class="form-control" id="datepickerto" name="todate" autocomplete="off" onchange="showUser()">
        </div>
        <div class="form-group">
            <label for="topic" style="font-size: 19px;">Enter To date</label>
            <input type="text" class="form-control" id="datepickerfrom" name="fromdate" autocomplete="off" onchange="showUser()">
        </div>
        <div id="date-label">date form is between label</div>
        <div style="overflow-x:auto;">
            <table id="myTable" class="display" data-toggle="table" style="width: 100%;">
            </table>
        </div>
    </div>
</body>
<script>
    $(function() {
        $("#datepickerto").datepicker({
            maxDate: new Date(),
            dateFormat: "dd-mm-yy"
        });
        $("#datepickerfrom").datepicker({
            maxDate: new Date(),
            dateFormat: "dd-mm-yy"
        });
    });


    //Setting the todays date in the datepiker
    $("#datepickerto").datepicker({
        dateFormat: 'dd-mm-yy', maxDate: 0 
    });

    $("#datepickerto").datepicker("setDate", new Date());

    $("#datepickerfrom").datepicker({
        dateFormat: 'dd-mm-yy', maxDate: 0 
    });
    $("#datepickerfrom").datepicker("setDate", new Date());

    //Inital call for the data
    showUser();

    //Method using the ajax for the table
    function showUser() {
        let todate = document.getElementById("datepickerto").value;
        let fromdate = document.getElementById("datepickerfrom").value;

        if (todate == fromdate)
            document.getElementById("date-label").innerHTML = "Today`s feedback are";
        else
            document.getElementById("date-label").innerHTML = "The Feedback between " + todate + " And " + fromdate + " are ";


        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("myTable").innerHTML = this.responseText;
            }
        };
        let roll = <?php echo $_SESSION['roll'] ?>;
        xmlhttp.open("GET", "FeedbackData.php?roll= " + roll + "&to=" + todate + "&from=" + fromdate, true);
        xmlhttp.send();
    }

    $('#myTable').DataTable({searching: false, paging: false, info: false});

</script>

</html>