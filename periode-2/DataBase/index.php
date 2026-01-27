<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

$dbHost = 'localhost';
$dbName = 'Rollercoaster_2509b';
$dbUser = 'root';
$dbPass = '';

try {
    $pdo = new PDO("mysql:host=$dbHost;dbname=$dbName;charset=utf8mb4", $dbUser, $dbPass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

$sql = "SELECT 
            Id,
            RollerCoaster,
            AmusementPark,
            Country,
            TopSpeed,
            Height,
            DATE_FORMAT(YearOfConstruction, '%d-%m-%Y') AS YOFC
        FROM Rollercoaster
        ORDER BY Height DESC";

$statement = $pdo->prepare($sql);
$statement->execute();
$result = $statement->fetchAll(PDO::FETCH_OBJ);



?>

<!doctype html>
<html lang="nl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hoogste achtbanen van Europa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-10">
            <h3 class="mb-3">Hoogste achtbanen van Europa</h3>

            <div class="row justify-content-center my-3">
                <div class="col-10"><h6>Nieuwe Achtbaan<a href="./create.php"><i class="bi bi-plus-square text-danger"></i></a></h5></div>
            </div>

            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Naam Achtbaan</th>
                        <th>Naam Pretpark</th>
                        <th>Land</th>
                        <th>Topsnelheid (km/u)</th>
                        <th>Hoogte (m)</th>
                        <th>Bouwjaar</th>
                        <th>Verwijder</th>
                    </tr>
                </thead>
                <tbody>
                <?php if (!empty($result)): ?>
                    <?php foreach ($result as $rollercoaster): ?>
                        <tr>
                            <td><?= htmlspecialchars($rollercoaster->RollerCoaster) ?></td>
                            <td><?= htmlspecialchars($rollercoaster->AmusementPark) ?></td>
                            <td><?= htmlspecialchars($rollercoaster->Country) ?></td>
                            <td><?= htmlspecialchars($rollercoaster->TopSpeed) ?></td>
                            <td><?= htmlspecialchars($rollercoaster->Height) ?></td>
                            <td><?= htmlspecialchars($rollercoaster->YOFC) ?></td>
                            <td class="text-center">
                                <a href="delete.php?id=<?=$rollercoaster->Id; ?>">
                                    <i class="bi bi-x-square text-danger">
                                        
                                    </i>
                                </a>
                            </td>
                            <td class="text-center">
                                <a href="update.php?id=<?= $rollercoaster->Id; ?>">
                                    <i class="bi bi-pencil-square text-succes"></i>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6" class="text-center">Geen gegevens gevonden</td>
                    </tr>
                <?php endif; ?>
                </tbody>
            </table>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
