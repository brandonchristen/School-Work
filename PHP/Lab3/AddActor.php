<style>
    table {border-collapse: collapse}
    th,td {border: 2px solid red}
</style>


<?php

require ("dbcon.php");

if(!empty($_POST['FirstName']) && !empty($_POST['LastName'])){
    //validooootion

    //connect to db

    if(!$connection){
        die("Can not connect to DB " . mysqli_connect_error());
    }

    //build our insert command
    $sql = "INSERT INTO actor (first_name, last_name) VALUES ('";
    $sql .= $_POST['FirstName'] . " ','";
    $sql .= $_POST['LastName'] . "')";


    //execute the query
    $result = mysqli_query($connection,$sql);

    if (!$result){
        die("Unable to insert new row" . mysqli_error($connection));
    }
    else{
        echo "<p> Saved! </p>";
    }

}
?>

<table>
    <thead>
    <tr>
        <th>ID</th>
        <th>First Name</th>
        <th>Last Name</th>
    </tr>
    </thead>
    <tbody>
    <?php

    $sql2 = mysqli_query($connection, "SELECT actor_id, first_name, last_name FROM actor ORDER BY actor_id DESC LIMIT 0,10");
    if(!$sql2){
        die("Invalid Query" . mysqli_error($connection));
    }

    while($row = mysqli_fetch_assoc($sql2)){
        echo "<tr>";

        echo "<td>" . $row['actor_id'] . "</td>";

        echo "<td>" . $row['first_name'] . "</td>";

        echo "<td>" .$row['last_name'] . "</td>";

        echo "</tr>";
        echo "<br/>";
    }
    mysqli_close($connection);


    ?>
    </tbody>
</table>




