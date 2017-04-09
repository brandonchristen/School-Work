<?php
?>

<a href="FarenheitConversion.php"> From Fahrenheit</a>

<style>
    td,th {border: 2px solid orange;
        padding: 3px;}
    table{border-collapse: collapse}

    table tr:nth-child(odd) td{
        background-color: lightsalmon;
    }

</style>


<table>
    <tr>
        <th>Celsius</th>
        <th>Fahrenheit</th>
    </tr>

    <?php
    for($c=0; $c<=100; $c++){
        $f = $c * (9/5) + 32;
        $f = round($f);
        echo "<tr> <td>$c</td> <td>$f</td> </tr>";
    }
    ?>

</table>
