<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="shortcut icon" href="https://upload.wikimedia.org/wikipedia/commons/2/2a/Php-logo.png"/>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles.css">
    <title>PHP-Basics</title>
</head>
<body>

<form>
    hoe laat is het? : <input type="time" name="time">
    <input type="submit">
</form>



<?php

    $dagdeel_1 = $_GET["time"];
    $getal = 8;
    $tijd1 = "00:00";
    $tijd2 = "06:00";
    $tijd3 = "12:00";
    $tijd4 = "20:00";

    $dagdeel_2 = 'middag';

    echo "<p>$dagdeel_1</p>";

    if ($getal == 5) {
        echo "<p>de waarde is gelijk aan 5</p>";
    }
    elseif ($getal < 5) {
        echo "<p>de waarde is kleiner dan 5 namelijk $getal</p>";
    }
    else {
        echo "<p>de waarde is groter dan 5 namelijk $getal</p>";
    }


    if ($dagdeel_1 > $tijd1 and $dagdeel_1 <= $tijd2) {
        echo "<p>Ik wens je een hele goede nachtrust</p>";
    }
    elseif ($dagdeel_1 > $tijd2 and $dagdeel_1 <= $tijd3) {
        echo "<p>Ik wens je een goede ochtend</p>";
    }
    elseif ($dagdeel_1 > $tijd3 and $dagdeel_1 < $tijd4) {
        echo "<p>Ik wens je een goede middag</p>";
    }

#    if











?>

</body>
</html>