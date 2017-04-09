<?php
require ("dbcon.php");

if(!empty($_POST['actor_ID'])){
//validooootion
$id = $_POST['actor_ID'];
//connect to db
if(!$connection){
die("Can not connect to DB " . mysqli_connect_error());
}

$sql = "SELECT * FROM actor WHERE actor_id = $id";

$result = mysqli_query($connection,$sql);

$data = mysqli_fetch_assoc($result);


//build our insert command
$sql2 = "UPDATE actor SET first_name = '";
$sql2 .= $_POST['FirstName'] . "', ";
$sql2 .= "last_name = '" . $_POST['LastName'] . "' ";
$sql2 .= "WHERE actor_id  = $id";

//execute the query
$result2 = mysqli_query($connection,$sql2);

if (!$result2){
die("Unable to update row" . mysqli_error($connection));
}
else{
mysqli_affected_rows($connection);

echo " <a href=UpdateActor.html>Back!</a> ";
}

mysqli_close($connection);
}
?>