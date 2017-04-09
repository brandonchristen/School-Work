<?php

$firstname="";
$lastname="";
$heightInFeet = 0;
$heightInInches =0;

if(!empty($_POST['fName']) && !empty($_POST['lName']) && !empty($_POST['feet'])
    && !empty($_POST['inches'])){

    $firstname = $_POST['fName'];
    $lastname = $_POST['lName'];
    $heightInFeet = $_POST['feet'];
    $heightInInches = $_POST['inches'];

    $Feet2Metres= 0;
    $Inches2Metres = 0;
    $TotalMetres = 0;

    $Feet2Metres = $heightInFeet * 0.3048;
    $Inches2Metres = $heightInInches * 0.0254;
    $TotalMetres = $Feet2Metres + $Inches2Metres;
}
?>

<?php
    $fileTmpName = $_FILES['userImg']['tmp_name'];
    $fileOrigName = $_FILES['userImg']['name'];
    $fileSize = $_FILES['userImg']['size'];
    $fileUploadError = $_FILES['userImg']['error'];

    move_uploaded_file($fileTmpName, "Uploads/".$fileOrigName);
?>


<p>
    <?php echo "Your First Name is: " . $firstname?>
</p>

<p>
    <?php echo "Your Last Name is: " . $lastname?>
</p>

<p>
    <?php echo "Your Height in metres is: " . $TotalMetres?>
</p>



<p>
    <?php echo "Temp: " . $fileTmpName ?>
</p>

<p>
    <?php echo "Orig: " . $fileOrigName ?>
</p>

<p>
    <?php echo "Size: " . $fileSize ?>
</p>

<p>
    <?php echo "Error: " . $fileUploadError ?>
</p>

<?php if($fileUploadError == 0){
    echo "<p>Saved!</p>";
}


