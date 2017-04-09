<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Actor</title>
</head>
<body>
<form id ="addActor" name = "addActor" action="<?php echo $_SERVER['PHP_SELF']; ?>" method = "post">
    <p><label>First Name:</label><input type = "text" id="FirstName" name="FirstName" value="" /></p>
    <p><label>Last Name:</label><input type = "text" id="LastName" name="LastName" value="" /></p>
    <input type = "submit" id="AddButton" name="AddButton" value="Submit" />
</form>
</body>
</html>
