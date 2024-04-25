<?php

session_start();
include dirname(__FILE__, 2) . '\common\Navbar.php';
require_once dirname(__FILE__, 3) . '/php/StudentOpration.php';
require_once dirname(__FILE__, 3) . '/php/GrievanceOperation.php';
require_once dirname(__FILE__, 3) . '/php/AdminOpration.php';
require_once dirname(__FILE__, 3) . '/php/SubjectDatabase.php';


//**********************************************************************************************************
//                                   If a FeedBack is Added to the Database
//**********************************************************************************************************
function Adding()
{

    $roll = $_SESSION["roll"];
    $date = $_POST['date'];
    $topic = $_POST['topic'];
    $msg = $_POST['msg'];
    $rate=$_POST['rate'];
    $type=$_POST['type'];
    $subject=$_POST['subject-values'];

    // echo $roll."<br>".$date."<br>".$topic."<br>".$msg."<br>".$rate."<br>".$type."<br>".$subject;
    GrievanceOperation::insertGrievance($roll, $topic, $msg, $subject, $date,$type,$rate);
    echo "<script> alert('" . "FeedBack Added sucessfully" . "') </script>";
}
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['Adding'])) {
    Adding();
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
    <style>
        .form-group {
            padding: 0.8rem;
            width: 42vw;
        }

        #AddSideBox {
            margin-top: 1vh;
            border: 0.2px solid white;
            border-radius: .5rem;
            margin-right: 0px;
            padding-top: 5px;
        }

        .dropdown-btn,
        .dropdown-btn:hover {
            border: 2px solid white;
        }

        .from-flex {
            display: flex;
        }

        .main-flex {
            display: flex;
            justify-content: center;
            margin-top: 6.5vh;
        }

        .heading {
            padding-block: 1vh;
            font-size: 30px;
        }

        .onediv {
            width: 45vw;
            border-right: 2px solid white;
        }

        #center-heading {
            display: flex;
            justify-content: center;
        }


        .dropdown-add-from {
            width: 100%;
        }

        .divtwo label {
            margin-bottom: 3vh;
        }

        @media only screen and (max-width: 990px) {
            .form-group {
                padding-left: 0.1rem;
                width: 100vw;
            }

            #AddSideBox {
                border: none;
                margin-left: 2vw;
            }

            .onediv {
                border-right: none !important;
            }

            .from-flex {
                flex-direction: column;
            }

            .container {
                padding: 0px;
            }
        }
    </style>

    <body>

        <div class="main-flex">
            <!-- Creating a form for Adding of the feed back -->
            <div class="mt-5" id="Add-form">
                <div id="AddSideBox">
                    <div id="center-heading">
                        <h2 class="heading">Add Feedback
                        </h2>
                    </div>
                    <form method="post" onSumbit="onSumbit()" id="form">
                        <div class="from-flex">
                            <div class="onediv">

                                <div class="form-group">
                                    <label for="topic">Enter Type</label>
                                    <select class="btn-group dropdown-add-from" style="width:100%;padding: 0.5vw;" id="type" name="type">
                                        <option selected>Enter Type</option>
                                        <option value="Instritute">Instritute</option>
                                        <option value="Faculity">Faculity</option>
                                        <option value="Other">Other</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="topic">Enter Topic</label>
                                    <input type="text" class="form-control" id="topic" placeholder="Enter your topic" name="topic" autocomplete="off"></input>
                                </div>

                                <div class="form-group" id="subject-DropDown">
                                    <label for="topic">Subject</label>
                                    <select class="btn-group dropdown-add-from" style="width:100%;padding: 0.5vw;" id="subject-values" name="subject-values">
                                        <option selected>Select Subject</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="topic">Rate</label>
                                    <select class="btn-group dropdown-add-from" style="width:100%;padding: 0.5vw;" name="rate">
                                        <option selected>Rate the feedback</option>
                                        <option value="Poor">Poor</option>
                                        <option value="Average">Average</option>
                                        <option value="Good">Good</option>
                                        <option value="Very Good">Very Good</option>
                                        <option value="Excellent">Excellent</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="date">Date Of Feedback</label>
                                    <input type="text" class="form-control" id="datepicker" name="date" autocomplete="off" placeholder="DD-MM-YYYY" readonly>
                                </div>
                            </div>
                            <div class="divtwo">
                                <div class="form-group">
                                    <label for="message">Enter Feedback</label>
                                    <textarea class="form-control" id="message" rows="15" placeholder="Enter your message" name="msg"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="sumbit-btn">
                            <div class="form-group" style="width: 100%;">
                                <div class="d-grid gap-2">
                                    <button class="btn btn-primary" type="sumbit" name="Adding">Add Feedback</button>
                                </div>
                            </div>
                        </div>
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
    //**********************************************************************************************************
    //                                    Used To display 7Days duration in Date of FeedBack
    //**********************************************************************************************************
    $(function() {
        $("#datepicker").datepicker({
            minDate: "-7D",
            maxDate: new Date(),
            dateFormat: "dd-mm-yy"
        });
    });

    //**********************************************************************************************************
    //                                 Used to change the question based on the user input 
    //**********************************************************************************************************
    function onTop(display_on_top) {
        if (display_on_top == "Faculity") {
            document.getElementById("subject-DropDown").style.display = "block";
        } else {
            document.getElementById("subject-DropDown").style.display = "none";
            document.getElementById("message").rows = 14;
        }

    }
    $('#type').change(function() {
        var selectedOption = $(this).val(); 
        onTop(selectedOption);
    });

    //**********************************************************************************************************
    //                                       Run if the Theam is Light
    //**********************************************************************************************************


    if (document.documentElement.getAttribute('data-bs-theme') == 'light') {
        let x = document.getElementsByClassName("dropdown-btn");
        for (let i = 0; i < x.length; i++) {
            x[i].style.backgroundColor = "white";
            x[i].style.borderColor = "#dee2e6";

        }
    }

    //**********************************************************************************************************
    //                                       Adding Subject in the DropDown
    //**********************************************************************************************************
    function populateList() {
        var ul = document.getElementById("subject-values");
        let subarray = <?php echo  json_encode(SubjectDatabase::getAllSubjects(StudentOpration::getSemester($_SESSION["roll"]))) ?>;
        subarray.forEach(function(item) {
            var li = document.createElement("option");
            li.textContent = item;
            ul.appendChild(li);
        });
    }
    populateList();
</script>