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
    <h2>werken met datatypen</h2>

    <?php

    $sport = 'tennis';
    echo "<p>Mijn favoriete sport is $sport</p>";

    $snack = "bitterballen";
    echo "<p>Mijn favoriete snack is $snack</p>";

    $leeftijd = 16;
    echo "<p>Ik ben $leeftijd jaar oud</p>";

    $prijs = 3.5;
    echo "<p>Het getal is $prijs</p>";

    $word_ik_miljonaire = true;

    if ($word_ik_miljonaire == true) {
        $word_ik_miljonaire = 'ja';
    } else {
        $word_ik_miljonaire = 'nee';
    }
    echo "<p>Word ik ooit miljonair? het antwoord is: $word_ik_miljonaire</p>";

    $repen = array("snickers", "mars", "bounty");
    echo "<p>Mijn favoriete repen zijn: $repen[0], $repen[1], en $repen[2]</p>";


    echo '<p>*****************************************</p>';

    $favoriete_games = [
        "War Thunder",
        "Rocket League",
        "Hell Divers 2"
    ];
    echo "<p>Mijn favoriete games</p>";
    echo "<ul>
            <li>$favoriete_games[0]</li>
            <li>$favoriete_games[1]</li>
            <li>$favoriete_games[2]</li>
          </ul>";


    $persoonsgegevens = [
        'voornaam' => 'Cain',
        'tussenvoegsel' => ' ',
        'achternaam' => 'Brouwer',
        'leeftijd' => 16,
        'woonplaats' => 'nieuwkoop',
        'huisnummer' => 1,
    ];

    echo "<p>Mijn naam is " . $persoonsgegevens['voornaam'] . $persoonsgegevens['tussenvoegsel'] . $persoonsgegevens['achternaam'] . "</p>";
    echo "<p>Ik ben " . $persoonsgegevens['leeftijd'] . " jaar oud</p>";
    echo "<p>Ik woon in " . $persoonsgegevens['woonplaats'] . " op huisnummer " . $persoonsgegevens['huisnummer'] . "</p>";

?>
</body>
</html>