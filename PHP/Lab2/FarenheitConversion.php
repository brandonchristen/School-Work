<?php
?>

<a href="CelsiusConversion.php">From Celsius</a>

<style>
    td,th {border: 2px solid orange;
           padding: 3px;}
    table{border-collapse: collapse}

    table tr:nth-child(odd) td{
        background-color: lightsalmon;
    }

</style>


<table>
    <tr><th>Fahrenheit</th><th>Celsius</th></tr>
    <?php
        for($f=0; $f<=100; $f++){
            $C = ($f -32) * (5/9);
            $C = round($C);
            echo "<tr> <td>$f</td> <td>$C</td> </tr>";
        }
    ?>

</table>

