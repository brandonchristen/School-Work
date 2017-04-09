<?php error_reporting(E_ERROR); ?>
<!DOCTYPE HTML>
<html>
<form id ="Search" name = "Search" method="post">
    <input type="text" name="search" id="searchfield"/>
    <input type="submit" name="submit" value="submit" id="submit" />
</form>
<head>
    <title>Search</title
</head>
<body>
<h1>Search For Employee</h1>
<table>
    <thead>
    <tr>
        <th>Employee Number</th>
        <th>Birthday</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Gender</th>
        <th>Hire Date</th>

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
    $q1 = mysqli_query($connection, "SELECT * FROM employees WHERE first_name LIKE '%" .  $SearchWord . "%' 
    OR last_name LIKE '%" .  $SearchWord . "%' LIMIT 0, 20 ");

    //Display Data
    if(!$q1) {
        die("Invalid Query" . mysqli_error($connection));
    }

    //loop through data
    while($row = mysqli_fetch_assoc($q1)){
        echo "<tr>";

        echo "<td>" . $row['emp_no'] . "</td>";

        echo "<td>" .$row['birth_date'] . "</td>";

        echo "<td>" .$row['first_name'] . "</td>";

        echo "<td>" .$row['last_name'] . "</td>";

        echo "<td>" .$row['gender'] . "</td>";

        echo "<td>" .$row['hire_date'] . "</td>";

        echo "</tr>";
    }

    if (!$connection){
        die("I died. RIP." . mysqli_connect_error());
    }

    //close connection
    mysqli_close($connection);

    echo "<form id='logoutForm' name='logoutForm' method='post' action ='' />" .
        "<input type='submit' id='logoutBtn' name='logoutBtn' value='Logout' />";

    if (isset($_POST['logoutBtn'])){
        $_SESSION['loggedIn'] = false;
        header('location:Login.php');
    }

    ?>
    </tbody>
</table>
</body>
</html>