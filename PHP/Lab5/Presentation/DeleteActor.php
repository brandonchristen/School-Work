<?php

if(!empty($_POST['actor_ID'])) {
    //validooootion
    require_once '../Data/dataAccess.php';
    require("../Business/Actor.php");
    $aID =$_POST['actor_ID'];
    $result = Actor::Delete($aID);

    if ($result){
        echo "<p>Actor Deleted</p>";
    }
    else{
        echo "<p>Error Deleting Actor</p>";
    }

}
?>
<body>
<a href="ViewActors.php">View Actors</a>
</body>
