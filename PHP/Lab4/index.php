<?php
include_once("shape.php");
include_once("Circle.php");
include_once("Rectangle.php");
include_once("Traignle.php");
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Shapes</title>
</head>
<body>
<form id ="Shapes" name = "Shapes"  method = "post" action= "index.php">
    <p><label>Rectangle Height:</label>

        <input type = "text" id="RectHeight" name="RectHeight"
               value="<?php echo isset($_POST['RectHeight']) ? $_POST['RectHeight'] : '' ?>"/>
    <label>Rectangle Width:</label>
        <input type = "text" id="RectWidth" name="RectWidth"
               value="<?php echo isset($_POST['RectWidth']) ? $_POST['RectWidth'] : '' ?>"/></p>


    <p><label>Triangle Height:</label>
        <input type = "text" id="TriangleHeight" name="TriangleHeight"
               value="<?php echo isset($_POST['TriangleHeight']) ? $_POST['TriangleHeight'] : '' ?>"/>

        <label>Triangle Base:</label>
        <input type = "text" id="TriangleBase" name="TriangleBase"
               value="<?php echo isset($_POST['TriangleBase']) ? $_POST['TriangleBase'] : '' ?>"/></p>

    <p><label>Triangle Modify:</label>
        <input type = "text" id="TriangleModify" name="TriangleModify"/>
        <input type = "submit" id ="TriangleModBtn" name="TriangleModBtn" value="Modify Triangle"></p>


    <p><label>Circle Radius:</label>
        <input type = "text" id="CircleRadius" name="CircleRadius"
               value="<?php echo isset($_POST['CircleRadius']) ? $_POST['CircleRadius'] : '' ?>"/></p>


    <p><label>Circle Modify:</label>
        <input type = "text" id="CircleModify" name="CircleModify"/>
        <input type = "submit" id ="CircleModBtn" name="CircleModBtn" value="Modify Circle"></p>

    <input type = "submit" id="submitButton" name="submitButton" value="Submit" />
</form>
</body>
</html>

<?php

if (isset($_POST['CircleRadius']) && isset($_POST['RectHeight']) && isset($_POST['RectWidth'])
    && isset($_POST['TriangleBase']) && isset($_POST['TriangleHeight'])) {

    $myCircle = new  Circle("Circle", $_POST['CircleRadius']);
    echo("<p>Cirlce Area: " . $myCircle->CalculateArea());


    if(isset($_POST['CircleModBtn'])){
        echo("<p>Circle Area Modified: " . $myCircle->Resize($_POST['CircleModify']));
    }

    $myRectangle = new  Rectangle("Rectangle", $_POST['RectHeight'], $_POST['RectWidth']);
    echo("<p>Rectangle Area: " . $myRectangle->CalculateArea());


    $myTriangle = new  Triangle("Triangle", $_POST['TriangleBase'], $_POST['TriangleHeight']);
    echo("<p>Triangle Area: " . $myTriangle->CalculateArea());

    if(isset($_POST['TriangleModBtn']) && isset($_POST['TriangleModify'])){
        echo("<p>Triangle Area Modified: " . $myTriangle->Resize($_POST['TriangleModify']));
    }

}//end isset IF

//resouces used:http://stackoverflow.com/questions/5198304/how-to-keep-form-values-after-post

else{

}

?>