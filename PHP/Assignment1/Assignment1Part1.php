<?php error_reporting(E_ERROR); ?>
<?php
ob_start();
if(session_id() == '') {
    session_start();
}

if($_SESSION['loggedIn'] == true) {
    ?>
    <!DOCTYPE HTML>
    <html>
    <head>
        <title>Employee List</title
    </head>
    <body>
    <h1>Employee List</h1>
    <form id="Search" name="Search" method="post">
        <input type="text" name="searchField" id="searchField" value=
        "<?php echo isset($_POST['searchField']) ? $_POST['searchField'] : '' ?>"/>
        <input type="submit" name="SearchSubmit" value="submit" id="SearchSubmit"/>
    </form>
    <table>
        <thead>
        <tr>
            <th>Employee Number</th>
            <th>Birthday</th>
            <th><form id='logoutForm' name='logoutForm' method='post' action ='' />
                <input type='submit' id='FNAME' name='FNAME' value='First Name' /></th>
            <th>Last Name</th>
            <th>Gender</th>
            <th>Hire Date</th>
            <th>Delete</th>
            <th>Edit</th>

        </tr>
        </thead>

        <tbody>

        <style>
            table {
                border-collapse: collapse
            }

            th, td {
                border: 2px solid red
            }
        </style>

        <?php
        if ($_SESSION['hasrun'] == true) {
            //don't reset the variables if the user has done anything
        } elseif ($_SESSION['hasrun'] == false) {
            //create variables used IN the SQL LIMIT
            $_SESSION['StartValue'] = 0;
            $_SESSION['EndValue'] = 25;
        }
        //hasn't ran yet by default
        $_SESSION['hasrun'] = false;


        require("dbcon.php");
        ///Define query
        //get first 25 employeees available
        $sql = "SELECT * FROM employees ";
        $SearchWord = $_POST['searchField'];

        if (isset($_POST['FNAME'])){
            $sql .= "ORDER BY emp_no DESC ";
        }

        if (isset($_POST['SearchSubmit']) && $_POST['searchField'] != null) {
            $sql .= "WHERE first_name LIKE '%" . $SearchWord . "%' 
        OR last_name LIKE '%" . $SearchWord . "%'";
            $sql .= "LIMIT ";
            $sql .= $_SESSION['StartValue'] . ", ";
            $sql .= $_SESSION['EndValue'];


        } elseif ($SearchWord != null) {
            $sql .= "WHERE first_name LIKE '%" . $SearchWord . "%' 
        OR last_name LIKE '%" . $SearchWord . "%'";
            $sql .= "LIMIT ";
            $sql .= $_SESSION['StartValue'] . ", ";
            $sql .= $_SESSION['EndValue'];
        } else {
            $sql .= "LIMIT ";
            $sql .= $_SESSION['StartValue'] . ", ";
            $sql .= $_SESSION['EndValue'];
        }

        $q1 = mysqli_query($connection, $sql);


        //Display Data
        if (!$q1) {
            die("Invalid Query" . mysqli_error($connection));

        }

        //loop through data
        while ($row = mysqli_fetch_assoc($q1)) {
            //creates table
            echo "<tr>";

            echo "<td>" . $row['emp_no'] . "</td>";

            echo "<td>" . $row['birth_date'] . "</td>";

            echo "<td>" . $row['first_name'] . "</td>";

            echo "<td>" . $row['last_name'] . "</td>";

            echo "<td>" . $row['gender'] . "</td>";

            echo "<td>" . $row['hire_date'] . "</td>";

            echo "<td>" . "<form 
        id =\"TableDelete\" name = \"TableDelete\"  action=\"\" method = \"post\" />" .
                //sets the value of the delete button equal to the employee ID
                "<input type=\"submit\" name=\"deleteBtn\" id=\"deleteBtn\" value=  " . $row['emp_no'] . " />" . "</td>";
            //This following line of code is SOOOOO cool but also janky as hell(i think)
            //It sends the user to the EditEmployee.php page
            //but see where it says ?id= row[emp_no]
            //that sets a GET variable named ID to the employee ID
            //so I just sent GET data through an <a> tag
            //Thats so cool.
            echo "<td>" . "<a href = \"EditEmployee.php?id=" . $row['emp_no'] . "\">Edit" . "</a>" . "</td>";


            echo "</tr>";
        }

        if (!$connection) {
            die("I died. RIP." . mysqli_connect_error());
        }

        if (isset($_POST['prev'])) {
            //make sure they cant go into the Negative employees.
            //because they suck
            if ($_SESSION['StartValue'] == 0) {

            } else {
                //otherwise its cool to change the limit variables
                $_SESSION['StartValue'] -= 25;
                $_SESSION['EndValue'] -= 25;
            }

        } elseif (isset($_POST['next'])) {
            //change the limit variables accordingly
            $_SESSION['StartValue'] += 25;
            $_SESSION['EndValue'] += 25;
        }
        //close connection
        $_SESSION['hasrun'] = true;
        mysqli_close($connection);

        ?>

        </tbody>

    </body>
    <footer>
        <form id="formButtons" name="formButtons" action="" method="post">
            <input type="submit" name="prev" id="prev" value="Previous"/>
            <input type="submit" name="next" id="next" value="next"/>
        </form>
    </footer>
    </html>

    <?php
    require("dbcon.php");

    if (isset($_POST['deleteBtn'])) {
        //if they clicked the delete button run this code

        //connect to db
        if (!$connection) {
            die("Can not connect to DB " . mysqli_connect_error());
        }

        $sql = "DELETE FROM employees WHERE emp_no =" . $_POST['deleteBtn'];

        //execute the query
        $result = mysqli_query($connection, $sql);

        if (!$result) {
            die("Unable to delete row" . mysqli_error($connection));
        } else {
            mysqli_affected_rows($connection);
        }

        mysqli_close($connection);
    }

    echo "<form id='logoutForm' name='logoutForm' method='post' action ='' />" .
        "<input type='submit' id='logoutBtn' name='logoutBtn' value='Logout' />";

    if (isset($_POST['logoutBtn'])) {
        $_SESSION['loggedIn'] = false;
        header('location:Login.php');
    }
    ob_end_flush();
}
else{
    session_destroy();
    header('location:Login.php');
    ob_end_flush();

}
?>