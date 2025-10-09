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

    <h2>werken met loops</h2>

    <?php

    echo '<h2>for loop</h2>';
    for ($i = 0; $i <= 70; $i+=7) {
        echo "<p>Getal: $i</p>";
    }

for ($i = 1; $i <= 5; $i++) {
    echo "<p>" . str_repeat("*", $i) . "</p>";
}

    echo "<h2><u>for each loop</u></h2>";
    $dieren = ['hond', 'kat', 'vis',];

    foreach ($dieren as $dier) {
        echo "<p>Huisdier: $dier</p>";
    }   
    
    $rang_getal = 1;

    echo "<h2>Mijn top 7 snoeplijst</h2>";

    echo '<p>--------------------------</p>';

    $snoep = ['mars', 'snickers', 'bounty', 'twix', 'chocolade', 'kauwgom', 'drop'];

    foreach ($snoep as $favoriet) {
        echo "<p>$rang_getal. $favoriet</p>";
        $rang_getal++;
    }

    echo '<h2>Foreach-loop associatief array</h2>';

    $leeftijden = [
        'Sarah' => 16,
        'Sieben' => 15,
        'Leontien' => 14,
    ];

    foreach ($leeftijden as $naam => $leeftijd) {
        echo "<p>Mijn naam is $naam en ik ben $leeftijd jaar oud.</p>";
    }


    ?>
    
</body>
</html>