<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include('../config/config.php');

$dsn = "mysql:host=$dbHost;dbname=$dbName;charset=utf8";
$pdo = new PDO($dsn, $dbUser, $dbPass);

$id = $_POST['id'] ?? $_GET['id'] ?? null;

if ($id === null) {
    die('Geen geldige ID');
}

$display = 'none';
$redirect = false;

if (isset($_POST['submit'])) {

    $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    $sql = "UPDATE Rollercoaster
            SET Rollercoaster = :rollerCoaster,
                AmusementPark = :amusementPark,
                Country = :country,
                Topspeed = :topSpeed,
                Height = :height,
                YearOfConstruction = :yearOfConstruction
            WHERE Id = :id";

    $statement = $pdo->prepare($sql);

    $statement->bindValue(':rollerCoaster', $_POST['naamAchtbaan'], PDO::PARAM_STR);
    $statement->bindValue(':amusementPark', $_POST['naamPretpark'], PDO::PARAM_STR);
    $statement->bindValue(':country', $_POST['land'], PDO::PARAM_STR);
    $statement->bindValue(':topSpeed', $_POST['topsnelheid'], PDO::PARAM_INT);
    $statement->bindValue(':height', $_POST['hoogte'], PDO::PARAM_INT);
    $statement->bindValue(':yearOfConstruction', $_POST['bouwjaar'], PDO::PARAM_STR);
    $statement->bindValue(':id', $id, PDO::PARAM_INT);

    $statement->execute();

    $display = 'flex';
    $redirect = true;
}

$sql = "SELECT Id,
               Rollercoaster,
               AmusementPark,
               Country,
               Topspeed,
               Height,
               YearOfConstruction
        FROM Rollercoaster
        WHERE Id = :id";

$statement = $pdo->prepare($sql);
$statement->bindValue(':id', $id, PDO::PARAM_INT);
$statement->execute();
$result = $statement->fetch(PDO::FETCH_OBJ);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hoogste achtbanen van Europa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-3">
    <div class="row justify-content-center">
        <div class="col-6">
            <h3 class="text-primary">Wijzig de Achtbaangegevens</h3>
        </div>
    </div>

    <div class="row justify-content-center" style="display:<?= $display ?>">
        <div class="col-6">
            <div class="alert alert-success text-center">
                De gegevens zijn gewijzigd. U wordt teruggestuurd naar de index-pagina.
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-6">
            <form method="POST">
                <input type="hidden" name="id" value="<?= $id ?>">

                <div class="mb-3">
                    <label class="form-label">Naam Achtbaan</label>
                    <input name="naamAchtbaan" type="text" class="form-control" required value="<?= $result->Rollercoaster ?>">
                </div>

                <div class="mb-3">
                    <label class="form-label">Naam Pretpark</label>
                    <input name="naamPretpark" type="text" class="form-control" required value="<?= $result->AmusementPark ?>">
                </div>

                <div class="mb-3">
                    <label class="form-label">Land</label>
                    <input name="land" type="text" class="form-control" required value="<?= $result->Country ?>">
                </div>

                <div class="mb-3">
                    <label class="form-label">Topsnelheid</label>
                    <input name="topsnelheid" type="number" class="form-control" required value="<?= $result->Topspeed ?>">
                </div>

                <div class="mb-3">
                    <label class="form-label">Hoogte</label>
                    <input name="hoogte" type="number" class="form-control" required value="<?= $result->Height ?>">
                </div>

                <div class="mb-3">
                    <label class="form-label">Bouwjaar</label>
                    <input name="bouwjaar" type="date" class="form-control" required value="<?= $result->YearOfConstruction ?>">
                </div>

                <div class="d-grid">
                    <button name="submit" class="btn btn-primary btn-lg">Opslaan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php if ($redirect): ?>
<script>
setTimeout(() => {
    window.location.href = 'index.php';
}, 2000);
</script>
<?php endif; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
