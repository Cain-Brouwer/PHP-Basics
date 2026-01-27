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

    <h2 style="text-align: center;">werken met array key manipulatie</h2>

    <?php

    $test_array = [
        'lang_woord' => 'programmeren',
        'kort_woord' => 'php',
        'scheikundige_naam' => 'hypertext preprocessor'
    ];


    echo "<p>een enkele letter uit {$test_array['lang_woord']} is: " . substr($test_array['lang_woord'], 0, 1) . "</p>";
    echo "<p>een enkele letter uit {$test_array['lang_woord']} is: " . substr($test_array['lang_woord'], 1, 1) . "</p>";
    echo "<p>een enkele letter uit {$test_array['lang_woord']} is: " . substr($test_array['lang_woord'], 2, 1) . "</p>";
    echo "<p>een enkele letter uit {$test_array['lang_woord']} is: " . substr($test_array['lang_woord'], 3, 1) . "</p>";
    echo "<p>een enkele letter uit {$test_array['lang_woord']} is: " . substr($test_array['lang_woord'], 4, 1) . "</p>";
    echo "<p>een enkele letter uit {$test_array['lang_woord']} is: " . substr($test_array['lang_woord'], 5, 1) . "</p>";
    echo "<p>een enkele letter uit {$test_array['lang_woord']} is: " . substr($test_array['lang_woord'], 6, 1) . "</p>";
    echo "<p>een enkele letter uit {$test_array['lang_woord']} is: " . substr($test_array['lang_woord'], 7, 1) . "</p>";
    echo "<p>een enkele letter uit {$test_array['lang_woord']} is: " . substr($test_array['lang_woord'], 8, 1) . "</p>";
    echo "<p>een enkele letter uit {$test_array['lang_woord']} is: " . substr($test_array['lang_woord'], 9, 1) . "</p>";
    echo "<p>een enkele letter uit {$test_array['lang_woord']} is: " . substr($test_array['lang_woord'], 10, 1) . "</p>";
    echo "<p>een enkele letter uit {$test_array['lang_woord']} is: " . substr($test_array['lang_woord'], 11, 1) . "</p>";
    echo "<p>het woord :{$test_array['lang_woord']} in stukken gehakt is: " . substr($test_array['lang_woord'], 0, 4) . " " . substr($test_array['lang_woord'], 4, 4) . " " . substr($test_array['lang_woord'], 8, 4) . "</p>";



    ?>





</body>
</html>