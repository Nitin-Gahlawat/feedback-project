<style>
  #theme{
    margin-right:20px;
  }
  #profile{
    padding-left:20px;
    border-left: solid white 2px;
  }
</style>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"><img  src='\feedback-project\public\html\comman\logo.jpg' alt="logo" width="200" ></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <?php
      if (session_status() != PHP_SESSION_ACTIVE) {
        echo '
        <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-auto">
          </ul>
      ';
      }
      else if($_SESSION["UserType"]=="Student"){
       echo ' <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-auto">
          <li class="nav-item">
            <a class="Btn " aria-current="page" href="./Add.php" id="Add" >Add</a>
          </li>
          <li class="nav-item">
            <a class="Btn " aria-current="page" href="./View.php" id="View">View Status</a>
          </li>
          <li class="nav-item">
            <a class="Btn " aria-current="page" href="./Search.php" id="Search">Search</a>
          </li>
        </ul>';
      }
      ?>
      <form class="d-flex " role="theme" method="post" action="..\Login.php" id="logout">
        <select name="theme" id="theme" class="justify-content-end">
            <option value="auto">Auto</option>
            <option value="dark">Dark</option>
            <option value="light">Light</option>
        </select>
      <?php
      if (session_status() != PHP_SESSION_ACTIVE) {
        echo '';
      }
      elseif($_SESSION["UserType"]=="Student"){
        ?>
          <!-- C:\xampp\htdocs\change-Arch\feedback-project\public\html\Login.php -->
          <!-- <input type="submit" form="logout" /> -->
          <button class="btn btn-primary" type="sumbit" name="logout" form="logout">
            <div class="profile" id="profile">
              <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
              </svg>
            </div>

          </button>
          <?php
      }
      ?>
      </form>
    </div>
  </div>
</nav>
<script>

  // This is the logic for changing the theme of the of the website.
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
    }
    else {
      document.documentElement.setAttribute('data-bs-theme', 'dark')
    }
  }
  let theme = document.getElementById("theme");
  //initial call
  setTheam(theme.value);

  //Adding a listner to change the value of the thaem
  theme.addEventListener("change", () => {
    setTheam(theme.value);
    console.log(theme.value);
  });


  function setActive(tab) {
            const TabsData=[
                "Add",
                "View",
                "Search"
            ]
              for (let i = 0; i < TabsData.length; i++) {
                if(tab==TabsData[i]){
                  let e1=document.getElementById(TabsData[i]);
                  e1.classList.add('btn-primary');
                }
                else{
                    let e1=document.getElementById(TabsData[i]);
                    e1.classList.remove("btn-primary");
                  }
              }
          }
          //setActive(NAME OF THE FILE IN WHICH THE NAVBAR.PHP IS INCLUDED);
          setActive(<?php echo "'".explode('.',basename($_SERVER['SCRIPT_FILENAME']))[0]."'";
?>)


console.log(document.getElementById('logout'));
</script>