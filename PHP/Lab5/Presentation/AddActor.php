<style>
    table {border-collapse: collapse}
    th,td {border: 2px solid red}
</style>


<?php


if(!empty($_POST['FirstName']) && !empty($_POST['LastName'])){
    //validooootion
    require("../Business/Actor.php");
    require_once '../Data/dataAccess.php';
    $MyActor = new Actor($_POST['FirstName'],$_POST['LastName']);

    //execute the query
    $result = $MyActor->save();

    if (!$result){
        die("Unable to insert new row");
    }
    else{
        echo "<p> Saved! </p>";
    }

}
?>
<body>
<a href="ViewActors.php">View Actors</a>
</body>





