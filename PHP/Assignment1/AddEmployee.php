<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Employee</title>
</head>
<body>
<form id ="addActor" name = "addActor" action="" method = "post">
    <p><label>Employee ID:</label><input type = "text" id="emp_no" name="emp_no" value="" /></p>
    <p><label>Birthday:</label><input type = "text" id="birth_date" name="birth_date" value="" /></p>
    <p><label>First Name:</label><input type = "text" id="first_name" name="first_name" value="" /></p>
    <p><label>Last Name:</label><input type = "text" id="last_name" name="last_name" value="" /></p>
    <p><label>Gender:</label><input type = "text" id="gender" name="gender" value="" /></p>
    <p><label>Hire Date:</label><input type = "text" id="hire_date" name="hire_date" value="" /></p>
    <input type = "submit" id="submitButton" name="submitButton" value="Submit" />
</form>
</body>
</html>

<style>
    table {border-collapse: collapse}
    th,td {border: 2px solid red}
</style>


<?php

require ("dbcon.php");

if(!empty($_POST['first_name']) && !empty($_POST['last_name'])){
    //validooootion

    //connect to db

    if(!$connection){
        die("Can not connect to DB " . mysqli_connect_error());
    }

    //build our insert command
    $sql = "INSERT INTO employees (emp_no,birth_date,first_name, last_name,gender,hire_date) VALUES ('";
    $sql .= $_POST['emp_no'] . " ','";
    $sql .= $_POST['birth_date'] . " ','";
    $sql .= $_POST['first_name'] . " ','";
    $sql .= $_POST['last_name'] . " ','";
    $sql .= $_POST['gender'] . " ','";
    $sql .= $_POST['hire_date'] . "')";


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
        <th>Birthday</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Gender</th>
        <th>Hire Date</th>
    </tr>
    </thead>
    <tbody>
    <?php

    $sql2 = mysqli_query($connection, "SELECT * FROM employees ORDER BY emp_no DESC LIMIT 0,10");

    if(!$sql2){
        die("Invalid Query" . mysqli_error($connection));
    }

    while($row = mysqli_fetch_assoc($sql2)){
        echo "<tr>";

        echo "<td>" . $row['emp_no'] . "</td>";

        echo "<td>" . $row['birth_date'] . "</td>";

        echo "<td>" .$row['first_name'] . "</td>";

        echo "<td>" .$row['last_name'] . "</td>";

        echo "<td>" .$row['gender'] . "</td>";

        echo "<td>" .$row['hire_date'] . "</td>";


        echo "</tr>";
        echo "<br/>";
    }
    mysqli_close($connection);


    ?>
    </tbody>
</table>