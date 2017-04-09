<?php
require ("dbcon.php");

if(!empty($_POST['actor_ID'])){
    //validooootion

    //connect to db
    if(!$connection){
        die("Can not connect to DB " . mysqli_connect_error());
    }

    //build our insert command
    $sql = "DELETE FROM actor WHERE actor_id = " . $_POST['actor_ID'];

    //execute the query
    $result = mysqli_query($connection,$sql);

    if (!$result){
        die("Unable to delete row" . mysqli_error($connection));
    }
    else{
        mysqli_affected_rows($connection);

        echo " <a href=DeleteActor.html>Back!</a> ";
    }

    mysqli_close($connection);
}
?>