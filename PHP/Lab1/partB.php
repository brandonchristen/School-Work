<?php
$Heading1 = "Greetings from lab 1!";
$Heading3 = "woooooo"
?>
<h1> <?php echo $Heading1?></h1>
<p>Welcome!</p>
<H3> <?php echo $Heading3?></H3>

<?php
$Name = "Brandon Christen";
?>
<h1> <?php echo $Name?></h1>

<?php $ultraString = "Today, " . "I " . "ate " . "pizza!"
?>
<h2> <?php echo $ultraString ?></h2>

<p>
    <?php $num1 = 32;
          $num2 = 14;
          $num3 = 83;

    echo ($num1 * $num2) + $num3
    ?>
</p>

<p>
    <?php $num1 = 1024;
          $num2 = 128;
          $num3 = 7;

    echo ($num1 / $num2) -$num3;
    ?>
</p>

<p>
    <?php $num1 = 769;
          $num2 = 6;

    echo $num1 % $num2;
    ?>
</p>

<?php
for($x=11; $x > 0; $x-=1){
    echo $x -1 . ".......";
    if($x ==1){
        echo "BLAST OFF!";
    }
}
?>

<p>
    <?php
    $ColourArray = array(
        "Red",
        "Orange",
        "Yellow",
        "Green",
        "Blue",
        "Indigo",
        "Violet"
    );
    for($i= 0; $i < count($ColourArray); $i++){
        echo $ColourArray[$i] . " ";
    }
    ?>
    <br/>

    <?php
    foreach($ColourArray as $colour){
        echo $colour . " ";
    }
    ?>
    <br/>

    <?php
    $h=-1;

    do{
        echo $ColourArray[$h] . " ";
        $h++;
    }
    while($h < count($ColourArray));
    ?>
</p>

