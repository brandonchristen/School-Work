<?php

    function makeHeadings($num, $text){
    if($num == 1){
        echo "<h1>$text</h1>";
    }
    elseif($num == 2){
        echo "<h2>$text</h2>";
    }
    elseif($num == 3){
        echo "<h3>$text</h3>";
    }
    elseif($num == 4){
        echo "<h4>$text</h4>";
    }
    elseif($num == 5){
        echo "<h5>$text</h5>";
    }
    elseif($num == 6){
        echo "<h6>$text</h6>";
    }
    else {
        $text = "Error message";
        echo "<p>$text</p>";
    }
}


$myTxt = "Hello World!";

for($x = 1; $x < 8; $x++){
    makeHeadings($x,$myTxt);
}

?>

<?php
$MyString = "I feel";
?>

<p>
    <?php echo $MyString?>
</p>

<?php

function byVal($mystring){
     $mystring .= ".....blah";
    return $mystring;
}
?>

<p>
    <?php echo byVal($MyString) ?>
</p>

<?php
    function byRef(&$someString){
         $someString .= ".....blah";
        return $someString;
    }
?>
<p>
    <?php echo $MyString?>
</p>

<p>
    <?php byRef($MyString);
        echo $MyString?>
</p>

<p>
    <?php echo $MyString?>
</p>

<?php $GlobalAge = 30;

function GlobalAgeFunc(){
    global $GlobalAge;
    return $GlobalAge - 11;
}
?>

<h1>
    <?php echo "You are: " . GlobalAgeFunc() . " years old!"; ?>
</h1>


