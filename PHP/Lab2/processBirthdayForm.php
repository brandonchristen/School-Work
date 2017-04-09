<body>
<?php
    $bdayMonth = "";
    $bdayDay= 0;
    $zodiac = "";

    if(!empty($_GET['month']) && !empty($_GET['day'])){
        $bdayMonth = $_GET['month'];
        $bdayDay   = $_GET['day'];

        if ($bdayMonth == "January" && $bdayDay >= 20){
            $zodiac = "Aquarius";
        }

        elseif($bdayMonth == "February" && $bdayDay <= 18){
            $zodiac = "Aquarius";
        }

        elseif($bdayMonth == "February" && $bdayDay >= 19){
            $zodiac = "Pisces";
        }

        elseif($bdayMonth == "March" && $bdayDay <= 20){
            $zodiac = "Pisces";
        }

        elseif($bdayMonth == "March" && $bdayDay >= 21){
            $zodiac = "Aries";
        }

        elseif($bdayMonth == "April" && $bdayDay <= 19){
            $zodiac = "Aries";
        }

        elseif($bdayMonth == "April" && $bdayDay >= 20){
            $zodiac = "Taurus";
        }

        elseif($bdayMonth == "May" && $bdayDay <= 20){
            $zodiac = "Taurus";
        }

        elseif($bdayMonth == "May" && $bdayDay >= 21){
            $zodiac = "Gemini";
        }

        elseif($bdayMonth == "June" && $bdayDay <= 20){
            $zodiac = "Gemini";
        }

        elseif($bdayMonth == "June" && $bdayDay >= 21){
            $zodiac = "Cancer";
        }

        elseif($bdayMonth == "July" && $bdayDay <= 22){
            $zodiac = "Cancer";
        }

        elseif($bdayMonth == "July" && $bdayDay >= 23){
            $zodiac = "Leo";
        }

        elseif($bdayMonth == "August" && $bdayDay <= 22){
            $zodiac = "Leo";
        }

        elseif($bdayMonth == "August" && $bdayDay >= 23){
            $zodiac = "Virgo";
        }

        elseif($bdayMonth == "September" && $bdayDay <= 22){
            $zodiac = "Virgo";
        }

        elseif($bdayMonth == "September" && $bdayDay >= 23){
            $zodiac = "Libra";
        }

        elseif($bdayMonth == "October" && $bdayDay <= 22){
            $zodiac = "Libra";
        }

        elseif($bdayMonth == "October" && $bdayDay >= 23){
            $zodiac = "Scorpio";
        }

        elseif($bdayMonth == "November" && $bdayDay <= 21){
            $zodiac = "Scorpio";
        }

        elseif($bdayMonth == "November" && $bdayDay >= 22){
            $zodiac = "Sagittarius";
        }

        elseif($bdayMonth == "December" && $bdayDay <= 21){
            $zodiac = "Sagittarius";
        }

        elseif($bdayMonth == "December" && $bdayDay >= 22){
            $zodiac = "Capricorn";
        }

        elseif($bdayMonth == "January" && $bdayDay <= 19){
            $zodiac = "Capricorn";
        }



    }
?>

<h1>
    <?php

    if(!empty($_GET['fName']) && !empty($_GET['lName'])){
        echo "Hello " . $_GET['fName']. " " . $_GET['lName'];
    }
    ?>
</h1>

<h2>
    <?php echo "Your zodiac sign is: " . $zodiac ?>
</h2>


</body>