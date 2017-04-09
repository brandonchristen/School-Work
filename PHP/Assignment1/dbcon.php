<?php error_reporting(E_ERROR); ?>
<?php
//connect to DB
$connection = mysqli_connect("localhost","root","inet2005","employees");

if (!$connection){
    die("I died. RIP." . mysqli_connect_error());
}



?>