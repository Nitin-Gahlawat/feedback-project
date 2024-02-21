<?php
include __Dir__.'\comman\bootstrap.php';
?>

<?php
require_once dirname(__FILE__,3).'/src/php/StudentOpration.php';
require_once dirname(__FILE__,3).'/src/php/GrievanceOperation.php';
    $ob=new StudentOpration();

    $rollno = $_POST["rollnum"];
    $password = $_POST["password"];
    $isexist=$ob->chkStudent($rollno,$password);

    session_start();
    $_SESSION["rollnum"] = $rollno;


    if($isexist){
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
    

<?php
include __Dir__.'\components\navbar.php';
include __Dir__.'\components\tabs.php';
echo '<h1>'.$_SESSION["rollnum"].'</h1>';

echo "<br>".$_POST["TypesUser"]."<br><br>";


$go=new GrievanceOperation();
$go->selectGrievances($rollno);

?>

</body>
</html>

<?php
    }
    else{
?>
    <h1>this login is incorrect<h1>
<?php
    }

?>