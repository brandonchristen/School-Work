<?php

//connect to DB
$connection = mysqli_connect("localhost","root","inet2005","sakila");

if (!$connection){
    die("I died. RIP." . mysqli_connect_error());
}



?>