<?php
include __DIR__ . "\link.php";

$cookie_name = "Theam";
$cookie_value = "Auto";
setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");

function isPHP_SESSION_ACTIVE()
{

    if (isset($_SESSION["UserType"])) {
        if ($_SESSION["UserType"] == "Student")
            $str = $_SESSION["UserType"];
        else if ($_SESSION["UserType"] == "Admin")
            $str = $_SESSION["UserType"];
        else
            $str = "Not-Active";
    } else {
        $str = "Not-Active";
    }
    return $str;
}
?>
<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        /* These properties are added when screen-size<990px */
        @media only screen and (max-width:990px) {

            /* Hide the extra-content on offcanvas-body */
            .offcanvas-body {
                position: relative;
                overflow: hidden;

            }

            /*  create a margin between two drop down profile and theam*/
            .dropdown {
                margin-bottom: 10px;
            }

            /* properties of the dropdown button */
            .dropdown-btn {
                height: 4vh;
                width: 90vw;
                margin-top: 1vh;
                margin-bottom: 1vh;
                padding-bottom: 5vh;
                border-radius: 2vh;
            }

            /* centering the panel of the the dropdown */
            .dropdown-panel-width {
                margin-left: 30vw;
                /* min-width: 100vw !important; */
            }

            /* Chnaging the dispay of the dropdown to  block and center*/
            .center-content {
                align-items: center;
                flex-direction: column;
                min-width: 100% !important;
            }

        }

        /* Setting the color of the nav-link active item */
        .custom-primary {
            background-color: rgb(13, 110, 253);
            border-color: #007bff;
            color: #ffffff;
            border-radius: 5px;
        }

        /* Setting the color (on hover)of the nav-link active item */
        .custom-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
            color: #ffffff;
        }

        /* Setting the width of the dropdown panel */
        .dropdown-panel-width {
            min-width: 90px !important;
        }
    </style>

</head>

<body>
    <!-- Navbar for displaying the various,tabs,Theam Option,Profile,Logout -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top">
        <!-- Image of the collage -->
        <a class="navbar-brand ms-2" href="#">
            <img src="/feedback-project/html/common/logo.jpg" alt="logo" width="200">
        </a>
        <!-- Button Toggle image when the navbar is shown in the small size -->
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#navbarOffcanvasLg" aria-controls="navbarOffcanvasLg" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="offcanvas offcanvas-end" tabindex="-1" id="navbarOffcanvasLg" aria-labelledby="navbarOffcanvasLgLabel">
            <!-- Heading of the Toogled navbar -->
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Offcanvas</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>

            <!-- Content of the navbar -->
            <div class="offcanvas-body">

                <!-- Center elements of the navbar -->
                <ul class="navbar-nav justify-content-center flex-grow-1 pe-1 mt-3" id="Tabs">

                </ul>

                <!-- Theam and Profile icon displayed on the Right side fo the navbar(in Desktop) -->
                <form action="/feedback-project/html/Login.php" method="post" class="d-flex mt-3 center-content" role="themeandprofile" id="logout">

                    <!-- Theam of the navbar -->
                    <div class="dropdown" id="Theme">
                        <button class=" btn btn-secondary dropdown-toggle me-1 dropdown-btn" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-circle-half 5 mt-2"></i>
                            <span>Auto </span>
                        </button>
                        <ul class="dropdown-menu dropdown-panel-width">
                            <li><a class="dropdown-item" href="#" id="auto">
                                    <i class="bi bi-circle-half 5 mt-2"></i>
                                    <span>Auto</span>
                                </a>
                            </li>
                            <li><a class="dropdown-item" href="#" id="dark">
                                    <i class="bi bi-moon"></i>
                                    <span>Dark</span>
                                </a>
                            </li>
                            <li><a class="dropdown-item" href="#" id="light">
                                    <i class="bi bi-brightness-low-fill"></i>
                                    <span>Light</span>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <!-- Profile and its item in navbar -->
                    <div class="dropdown me-3" id="Profile" class="Profile">
                        <button class="btn btn-secondary dropdown-toggle dropdown-btn Profile" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-person-circle h4"></i>
                            <span>Profile</span>
                        </button>
                        <ul class="dropdown-menu dropdown-panel-width">
                            <li><a class="dropdown-item Profile" id="Edit-profile" href="/feedback-project/html/Student/Profile.php">
                                    <i class="bi bi-pencil"></i>
                                    <span>Edit Profile</span>
                                </a>
                            </li>
                            <li><a class="dropdown-item Profile">
                                    <i class="bi bi-power"></i>
                                    <span><input type="submit" value="Logout" name="Logout" style="all: unset;"></span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </form>
            </div>
        </div>
        </div>
    </nav>
</body>

</html>
<script>
    //*********************************************************************************************************
    //                             Creating the number of tabs based on the type of the user
    //**********************************************************************************************************
    let TabsData = []
    if ('<?php echo isPHP_SESSION_ACTIVE() ?>' == 'Student') {
        document.getElementById('Tabs').innerHTML =
            `<li class="nav-item">
                        <a class="nav-link btn " aria-current="page" href="Add.php" id="Add" onclick="setActive('Add')">Add</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn" aria-current="page" href="Search.php" id="Search" onclick="setActive('Search')">Search</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn" aria-current="page" href="Profile.php" id="Profile" onclick="setActive('Profile')">Profile</a>
                    </li>   `;
        document.getElementById('Edit-profile').style.display = "block";
        TabsData = [
            "Add",
            "Search",
            "Profile"
        ]
    } else if ('<?php echo isPHP_SESSION_ACTIVE() ?>' == "Admin") {
        document.getElementById('Tabs').innerHTML =
            `<li class="nav-item">
                        <a class="nav-link btn " aria-current="page" href="View.php" id="View" onclick="setActive('View')">View</a>
                    </li> `;
        document.getElementById('Edit-profile').style.display = "none";
        TabsData = [
            "View",
        ]
    } else {
        let temp = document.getElementsByClassName("Profile");
        for (let i = 0; i < temp.length; i++) {
            temp[i].style.display = "none";

        }
        document.getElementById('Tabs').innerHTML = `<li class="nav-item"></li>  `
        TabsData = [
        ]

    }
    //**********************************************************************************************************
    //                                  Setting the Tabs active and unActive
    //**********************************************************************************************************
    // All tabs in the navbar

    function setActive(tab) {
        for (let i = 0; i < TabsData.length; i++) {
            console.log(TabsData[i]);
            if (tab == TabsData[i]) {

                let e1 = document.getElementById(TabsData[i]);
                e1.classList.add('custom-primary');
            } else {
                let e1 = document.getElementById(TabsData[i]);
                e1.classList.remove("custom-primary");
            }
        }
    }
    //setActive(NAME OF THE FILE IN WHICH THE NAVBAR.PHP IS INCLUDED);
    setActive(<?php echo "'" . explode('.', basename($_SERVER['SCRIPT_FILENAME']))[0] . "'" ?>);

    //**********************************************************************************************************
    //                                          Theam working 
    //**********************************************************************************************************
    function setTheam(theamoption) {
        
        if (theamoption === "auto") {
            if (window.matchMedia('(prefers-color-scheme: dark)').matches)
                document.documentElement.setAttribute('data-bs-theme', 'dark')
            else if (window.matchMedia('(prefers-color-scheme: light)').matches)
                document.documentElement.setAttribute('data-bs-theme', 'light')
            else
                document.documentElement.setAttribute('data-bs-theme', 'dark')
        } else if (theamoption === "dark") {
            document.documentElement.setAttribute('data-bs-theme', 'dark')
        } else if (theamoption === "light") {
            document.documentElement.setAttribute('data-bs-theme', 'light')
        } else {
            document.documentElement.setAttribute('data-bs-theme', 'dark')
        }
    }
    //initial call
    setTheam('auto');


    // .dropdown-menu li
    $('#Theme li a').on('click', function() {
        var itemId = $(this).attr('id');
        // console.log(itemId);
        setTheam(itemId);
        $('#Theme Button span').html(itemId.charAt(0).toUpperCase() + itemId.slice(1));
    });
</script>