<!DOCTYPE HTML>
<html>
<form method="post">
    <input type="text" name="search" id="searchfield"/>
    <input type="submit" name="submit" value="submit" id="submit" />
</form>
<head>
    <title>Search</title
</head>
<body>
<h1>Sakila Film List</h1>
<table>
    <thead>
    <tr>
        <th>Title</th>
        <th>Description</th>
    </tr>
    </thead>
    <tbody>

    <style>
        table {border-collapse: collapse}
        th,td {border: 2px solid red}
    </style>

    <?php

    require ("dbcon.php");
    ///Define query
    $SearchWord = $_POST['search'];
    $q1 = mysqli_query($connection, "SELECT * FROM film WHERE description LIKE '%" .  $SearchWord . "%'  LIMIT 0, 10 ");

    //Display Data
    if(!$q1){
        die("Invalid Query" . mysqli_error($connection));
    }
    $row = mysqli_fetch_assoc($q1);

    $rows = array();
    //loop through data
    while($row = mysqli_fetch_assoc($q1)){
        $rows[]=$row;
    }
    for($i = 0; $i < sizeof($rows); $i++){
        echo "<tr>";

        echo "<td>" . $rows[$i]['title'] . "</td>";

        echo "<td>" .$rows[$i]['description'] . "</td>";

        echo "</tr>";
        echo "<br/>";
    }

    if (!$connection){
        die("I died. RIP." . mysqli_connect_error());
    }

    //close connection
    mysqli_close($connection);

    ?>
    </tbody>
</table>
</body>
</html>