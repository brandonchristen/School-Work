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
<form name="SearchForm" id="SearchForm" action="" method="post">
    <input type="text" id="Search" name="Search">
    <input type="submit" id="SubmitSearch" name="SubmitSearch">
</form>
<h1>Actors:</h1>
<table>
    <thead>
    <tr>
        <td>Actor ID</td>
        <td>First Name</td>
        <td>Last Name</td>
    </tr>
    </thead>
    <tbody>
    <?php
    require("../Business/Actor.php");
    if (isset($_POST['Search'])) {
        $Searchword = $_POST['Search'];
        $arrayOfActors = Actor::Search($Searchword);

        foreach ($arrayOfActors as $Actor):

            ?>
            <tr>
                <td><?php echo $Actor->getID(); ?></td>
                <td><?php echo $Actor->getFirstName(); ?></td>
                <td><?php echo $Actor->getLastName(); ?></td>
            </tr>
            <?php
        endforeach;
    }
    else{

    }
    ?>
    </tbody>
</table>
<a href="AddActor.html">Add Actor</a>
<a href="UpdateActor.html">Update Actor</a>
<a href="DeleteActor.html">Delete Actor</a>
</body>
</html>