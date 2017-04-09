<!DOCTYPE HTML>
<html>
<head>
    <title>Sakila Film List</title
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
$q1 = mysqli_query($connection, "SELECT * FROM film LIMIT 25");


//Display Data
if(!$q1){
    die("Invalid Query" . mysqli_error($connection));
}

//loop through data
while($row = mysqli_fetch_assoc($q1)){
    echo "<tr>";

    echo "<td>" . $row['title'] . "</td>";

    echo "<td>" .$row['description'] . "</td>";

    echo "</tr>";
    echo "<br/>";
}

if (!$connection){
    die("I died. RIP." . mysqli_connect_error());
}

//close connection
mysqli_close($connection);

?>
</body>
</html>