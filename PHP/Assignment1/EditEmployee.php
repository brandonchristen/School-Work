<?php
ob_start();
if(session_id() == '') {
    session_start();
}

if($_SESSION['loggedIn'] == true) {
//DECLARE REGEX VARIABLES
    $genderRegex = '[MF]';
    $nameRegex = '[A-Z][a-z]*';

    $emp_no = $_GET['id'];
    require("dbcon.php");
//connect to db
    if (!$connection) {
        die("Can not connect to DB " . mysqli_connect_error());
    }

    $sql = "SELECT * FROM employees WHERE emp_no = $emp_no";

    $result = mysqli_query($connection, $sql);

    $data = mysqli_fetch_assoc($result);
    ?>


    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Update</title>
    </head>
    <body>
    <form id="editEmployee" name="editEmployee" action="" method="post">
        <!-- This sets the Value We snatched from GET into the textbox, and makes sure
              The user can't mess it up and ruin everything-->
        <p><label>ID:</label><input type="text" id="emp_no" name="emp_no"
                                    value="<?php echo isset($_GET['id']) ? $_GET['id'] : '' ?>" readonly="readonly"/>
        </p>

        <p><label>Birthday:</label><input type="date" id="bday" name="bday" value="<?php echo $data['birth_date']?>"/>
        </p>
        <p><label>First Name:</label><input type="text" id="FirstName" name="FirstName"
                                            value="<?php echo $data['first_name'] ?>"/></p>
        <p><label>Last Name:</label><input type="text" id="LastName" name="LastName"
                                           value= "<?php echo $data['last_name'] ?>"/></p>
        <p><label>Gender:</label><input type="text" id="Gender" name="Gender" value= "<?php echo $data['gender']?>"/></p>
        <p><label>Hire Date:</label><input type="date" id="HireDate" name="HireDate"
                                           value="<?php echo $data['hire_date'] ?>"/> </p>
        <input type="submit" id="submitButton" name="submitButton" value="Submit"/>
    </form>
    </body>
    </html>


    <?php
    if (isset($_POST['bday'])) {
        $fname = $_POST['FirstName'];
        $fname = stripslashes($fname);
        $fname = mysqli_real_escape_string($connection, $fname);

        $lname = $_POST['LastName'];
        $lname = stripslashes($lname);
        $lname = mysqli_real_escape_string($connection, $lname);


        //build our insert command
        $sql2 = "UPDATE employees SET birth_date = '";
        $sql2 .= $_POST['bday'] . "', ";
        $sql2 .= "first_name = '" . $fname . "', ";
        $sql2 .= "last_name = '" . $lname . "', ";
        $sql2 .= "gender = '" . $_POST['Gender'] . "', ";
        $sql2 .= "hire_date = '" . $_POST['HireDate'] . "' ";
        $sql2 .= "WHERE emp_no  = $emp_no";

//execute the query
        $result2 = mysqli_query($connection, $sql2);

        if (!$result2) {
            die("Unable to update row" . mysqli_error($connection));
        } else {
            mysqli_affected_rows($connection);
            //if the edit worked give them a way back to the List
            echo " <a href=Assignment1Part1.php>Back!</a> ";
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