<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Customers</title>
    <style type="text/css">
        table
        {
            border: 1px solid purple;
        }
        th, td
        {
            border: 1px solid red;
        }
    </style>
</head>
<body>
    <?php
    require("../Business/Actor.php");
    if (isset($_POST['actor_ID']) && isset($_POST['FirstName']) && isset($_POST['LastName'])) {
        $SearchID = $_POST['actor_ID'];
        $ActorName = Actor::GetNameByID($SearchID);
        //get the real name to create actor object
        $first_name = $ActorName['first_name'];
        $last_name = $ActorName['last_name'];
        //get the new values for the name
        $newFirstName = $_POST['FirstName'];
        $newLastName = $_POST['LastName'];

        //create Actor object
        $MyActor = new Actor($first_name,$last_name);
        //then give the actor the ID of the ID that the user Entered.
        $MyActor->SetID($SearchID);
        //then update
        $MyActor->Update($newFirstName,$newLastName);

    }
    ?>
<a href="AddActor.html">Add Actor</a>
<a href="UpdateActor.html">Update Actor</a>
<a href="DeleteActor.html">Delete Actor</a>
</body>
</html>