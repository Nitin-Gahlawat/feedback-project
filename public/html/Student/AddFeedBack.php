<?php
include dirname(__FILE__,2).'\comman\bootstrap.php';

require_once dirname(__FILE__,4).'/src/php/StudentOpration.php';
require_once dirname(__FILE__,4).'/src/php/GrievanceOperation.php';
require_once dirname(__FILE__,4).'/src/php/AdminOpration.php';

?>

<!DOCTYPE html>

<!-- bootstrap dark thream -->
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
            <a class="nav-link active" aria-current="page" href="#">Add</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Remove</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Update</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">View Status</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">History</a>
          </li>
        </ul>
        
      </div>
    </div>
  </nav>

  <h1>hello world from students</h1>

</body>

</html>



<?php
        session_start();
        echo $_SESSION["UserType"];
        $ob=new GrievanceOperation();
        $ob->selectGrievances( $_SESSION["rollnum"]);
?>