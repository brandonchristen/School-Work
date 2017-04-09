
<?php
session_start();
ob_start();
$_SESSION['loggedIn'] = false;
?>
<form id="Login" name="Login" action="" method="post">
    <p><label>Username</label><input type="text" id="username" name="username"/></p>
    <p><label>Password</label><input type="password" id="pass" name="pass"/></p>
    <input type="submit" id="submit" name="submit" value="Log In">
</form>
<style>
   #badlogin{
       color: red;
       font-weight: bold;
   }
</style>
<?php
require ("dbcon.php");
//connect to db
if(!$connection){
    die("Can not connect to DB " . mysqli_connect_error());
}
if (isset($_POST['username'])){
    $username = $_POST['username'];
    $username = stripslashes($username);
    $username = mysqli_real_escape_string($connection,$username);

    $password = $_POST['pass'];
    $password = stripslashes($password);
    $password = mysqli_real_escape_string($connection,$password);

    $hash = hash("sha512",$password);

    $sql = "SELECT * FROM WebUsers WHERE UserName = '$username' AND UserPass = '$hash'";

    $result = mysqli_query($connection, $sql);

    if (!$result){
        die("Error!") + mysqli_error($connection);
    }

    $count = mysqli_num_rows($result);

    if ($count == 1){
        $_SESSION['loggedIn'] = true;
        header('location:Assignment1Part1.php');
    }
    else{
        echo "<p id='badlogin'>INVALID USERNAME/PASSWORD</p>";
    }
    ob_end_flush();
}

?>