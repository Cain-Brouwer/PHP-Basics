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
    hoe laat is het? : <input type="time" name="time"><br><br>

    welk diploma heb je? : <input type="text" name="text"><br><br>

    wat is je cijfer? : <input type="number" name="number"><br><br>
    <input type="submit">
</form>

<?php

    $dagdeel_1 = $_GET["time"];
    $getal = 8;
    $tijd1 = "00:00";
    $tijd2 = "06:00";
    $tijd3 = "12:00";
    $tijd4 = "20:00";

    if ($dagdeel_1 > $tijd1 and $dagdeel_1 <= $tijd2) {
        echo "<p>Ik wens je een hele goede nachtrust</p>";
    }
    elseif ($dagdeel_1 > $tijd2 and $dagdeel_1 <= $tijd3) {
        echo "<p>Ik wens je een goede ochtend</p>";
    }
    elseif ($dagdeel_1 > $tijd3 and $dagdeel_1 < $tijd4) {
        echo "<p>Ik wens je een goede middag</p>";
    }
    else {
        echo "<p>Ik wens je een goede avond</p>";
    }

    if ($getal == 5) {
        echo "<p>de waarde is gelijk aan 5</p>";
    }
    elseif ($getal < 5) {
        echo "<p>de waarde is kleiner dan 5 namelijk $getal</p>";
    }
    else {
        echo "<p>de waarde is groter dan 5 namelijk $getal</p>";
    }

    $userrole = 'superuser';

    switch ($userrole) {
        case 'admin':
            echo '<p>Welkom terug op de admin pagina</p>';
            break;
        case 'customer':
            echo '<p>Welkom terug op de customer pagina</p>';
            break;
        case 'moderator':
            echo '<p>Welkom terug op de moderator pagina</p>';
            break;
        case 'hacker':
            echo '<p>Helaas ben je niet zo welkom hacker</p>';
            break;
        case 'superuser':
            echo '<p>Welkom terug op de superuser pagina</p>';
            break;
        default:
            echo 'Deze gebruikersrol is niet bekend in het systeem';
    }

    $DiplomaChecker = $_GET['text'];

    switch ($DiplomaChecker) {
        case 'VMBO-TL':
            echo "<p>Ik heb mijn VBMO TL diploma gehaald</p>";
            break;
        case 'VMBO-Basis':
            echo "<p>Ik heb mijn VMBO Basis diploma gehaald</p>";
            break;
        case 'VMBO-Kader':
            echo "<p>Ik heb mijn VMBO Kader diploma gehaald</p>";
            break;
        case 'VMBO-Gemengd':
            echo "<p>Ik heb mijn VMBO Gemengd diploma gehaald</p>";
            break;
        case 'HAVO';
            echo "<p>Ik heb mijn HAVO diploma gehaald</p>";
            break;
        case 'VWO';
            echo "<p>Ik heb mijn VWO diploma gehaald</p>";
            break;
        default:
            echo "<p>Uw opleiding is bij ons niet bekent.</p>";

    }

    $dag = 'woensdag';

    $boodschap = match ($dag) {
        'maandag' => 'De week is begonnen, tijd om te knallen',
        'dinsdag' => 'Tweede dag van de week, je bent goed op weg!',
        'woensdag' => 'Het is woensdag - halverwege de week!',
        'donderdag' => 'Nog even doorzetten, het weekend komt eraan!',
        'vrijdag' => 'Vrijdag! Bijna weekend',
        'zaterdag' => 'Weekend! Tijd om te relaxen',
        'zondag' => 'Rustdag... of lekker gamen natuurlijk',
        default => 'Onbekende dag, controleer je invoer.',
    };

    echo "$boodschap";

    $cijfer = $_GET['number'];

    $rapport = match ($cijfer) {
        '1' => 'Je hebt een Onvoldoende',
        '2' => 'Je hebt een Onvoldoende',
        '3' => 'Je hebt een Onvoldoende',
        '4' => 'Je hebt een Onvoldoende',
        '5' => 'Je hebt een Matig cijfer',
        '6' => 'Je hebt een Voldoende',
        '7' => 'Je hebt een Voldoende',
        '8' => 'Je hebt een Goed cijfer',
        '9' => 'Je hebt een Goed cijfer',
        '10' => 'Je hebt een Uitstekend cijfer!',
        default => 'Dit is een Ongeldig cijfer',
    };

    echo "<p>$rapport</p>"

?>

</body>
</html>