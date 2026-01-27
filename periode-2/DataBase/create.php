<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include('../config/config.php');

$display = 'none';

if (isset($_POST['submit'])) {
    $dsn = "mysql:host=$dbHost;dbname=$dbName;charset=utf8mb4";
    $pdo = new PDO($dsn, $dbUser, $dbPass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $naamAchtbaan = filter_input(INPUT_POST, 'naamAchtbaan', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $naamPretpark = filter_input(INPUT_POST, 'naamPretpark', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $land = filter_input(INPUT_POST, 'land', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $topsnelheid = filter_input(INPUT_POST, 'topsnelheid', FILTER_VALIDATE_INT);
    $hoogte = filter_input(INPUT_POST, 'hoogte', FILTER_VALIDATE_INT);
    $bouwjaar = $_POST['bouwjaar'];

    $sql = "INSERT INTO Rollercoaster
            (RollerCoaster, AmusementPark, Country, TopSpeed, Height, YearOfConstruction)
            VALUES
            (:rollercoaster, :amusementpark, :country, :topspeed, :height, :yearofconstruction)";

    $statement = $pdo->prepare($sql);
    $statement->bindValue(':rollercoaster', $naamAchtbaan);
    $statement->bindValue(':amusementpark', $naamPretpark);
    $statement->bindValue(':country', $land);
    $statement->bindValue(':topspeed', $topsnelheid, PDO::PARAM_INT);
    $statement->bindValue(':height', $hoogte, PDO::PARAM_INT);
    $statement->bindValue(':yearofconstruction', $bouwjaar);
    $statement->execute();

    $display = 'flex';
}
?>

<!doctype html>
<html lang="nl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hoogste achtbanen van Europa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <?php if ($display === 'flex'): ?>
        <meta http-equiv="refresh" content="2;url=index.php">
    <?php endif; ?>
</head>
<body>
<div class="container mt-3">
    <div class="row justify-content-center">
        <div class="col-6">
            <h3 class="text-primary">Voer een nieuwe achtbaan in:</h3>
        </div>
    </div>

    <div class="row justify-content-center" style="display:<?= $display; ?>;">
        <div class="col-6">
            <div class="alert alert-success text-center" role="alert">
                De gegevens zijn toegevoegd. U wordt teruggestuurd naar de index-pagina.
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-6">
            <form action="create.php" method="POST">
                <div class="mb-3">
                    <label for="inputNaamAchtbaan" class="form-label">Naam Achtbaan:</label>
                    <input name="naamAchtbaan" placeholder="Vul de naam van de achtbaan in" type="text" class="form-control" id="inputNaamAchtbaan" required>
                </div>
                <div class="mb-3">
                    <label for="inputNaamPretpark" class="form-label">Naam Pretpark:</label>
                    <input name="naamPretpark" placeholder="Vul de naam van het pretpark in" type="text" class="form-control" id="inputNaamPretpark" required>
                </div>
                <div class="mb-3">
                    <label for="inputLand" class="form-label">Land:</label>
                    <input name="land" placeholder="Vul het land in" type="text" class="form-control" id="inputLand" required>
                </div>
                <div class="mb-3">
                    <label for="inputTopsnelheid" class="form-label">Topsnelheid:</label>
                    <input name="topsnelheid" placeholder="Vul de topsnelheid in" type="number" min="0" max="255" class="form-control" id="inputTopsnelheid" required>
                </div>
                <div class="mb-3">
                    <label for="inputHoogte" class="form-label">Hoogte:</label>
                    <input name="hoogte" placeholder="Vul de hoogte in" type="number" min="0" max="255" class="form-control" id="inputHoogte" required>
                </div>
                <div class="mb-3">
                    <label for="inputYearOfConstruction" class="form-label">Bouwjaar:</label>
                    <input name="bouwjaar" type="date" class="form-control" id="inputYearOfConstruction" required>
                </div>
                <div class="d-grid gap-2">
                    <button name="submit" type="submit" class="btn btn-primary btn-lg mt-2">Verstuur</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
