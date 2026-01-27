<!DOCTYPE html>
<html lang="nl">
<head>
    <link rel="shortcut icon" href="https://upload.wikimedia.org/wikipedia/commons/2/2a/Php-logo.png"/>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles.css">
    <title>PHP-Basics</title>
</head>
<body>
    <h2>tekst en commentaar weergeven in de browser</h2>

    <?php
    $voornaam = 'Cain';
    $achternaam  = 'Brouwer';
    $straatnaam = 'Kerkstraat';
    $getal1 = 8;
    $getal2 = 2;
    $getal3 = 36;
    $som = $getal1 + $getal2;
    $delen = $getal1 / $getal2;
    $vermenigvuldigen = $getal1 * $getal2;
    $verschil = $getal1 - $getal2;
    $machten = $getal1 ** $getal2;
    $wortel = sqrt($getal3);


    echo '<p>Mijn voornaam is ' . $voornaam . '</p>';

    echo '<p>Mijn achternaam is ' . $achternaam . '</p>';

    echo '<p>Mijn straatnaam is ' . $straatnaam . '</p>';

    //echo "<p>Mijn voornaam is $voornaam</p>";
    
    //echo '<p>Mijn achternaam is $achternaam</p>';

    echo "<p>De som van $getal1 + $getal2 = $som</p>";
    echo "<p>De deling van $getal1 / $getal2 = $delen</p>";
    echo "<p>De vermenigvuldiging van $getal1 * $getal2 = $vermenigvuldigen</p>";
    echo "<p>Het verschil van $getal1 - $getal2 = $verschil</p>";
    echo "<p>$getal1 tot de macht $getal2 = $machten</p>";
    echo "<p>De wortel van $getal3 = $wortel</p>";


    // delen / , vermenigvuldigen * , verschil - , optellen +, machtverheffen **



    ?>


</body>
</html>