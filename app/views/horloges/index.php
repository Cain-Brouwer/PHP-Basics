<?php require_once APPROOT . '/views/includes/header.php'; ?>

<div class="container">
    <div class="row mt-3 d-flex justify-content-center">
        <div class="col-10">
            <h3><?php echo $data['title']; ?></h3>

        <div class="row mt-3 d-<?= $data['display']; ?> justify-content-center">
            <div class="col-10 text-begin text-primary">
                <div class="alert alert-success" role="alert">
                    <?= $data['message']; ?>
                </div>
            </div>
        </div>

                <div class="row mt-3 d-flex justify-content-center">
            <div class="col-10 text-begin text-danger">
                <a href="<?= URLROOT; ?>/HorlogeController/create"
                class="btn btn-warning"
                role="button">Nieuw horloge
                </a>
            </div>
        </div>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Merk</th>
                        <th>Model</th>
                        <th>Type</th>
                        <th>Prijs</th>
                        <th>Materiaal</th>
                        <th>Waterdichtheid</th>
                        <th>UniekKenmerk</th>
                        <th>Gewicht</th>
                        <th>Releasedatum</th>
                        <th>Verwijder</th>
                        <th>Wijzig</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($data['result'] as $horloge) : ?>
                        <tr>
                            <td><?= $horloge->Merk; ?></td>
                            <td><?= $horloge->Model; ?></td>
                            <td><?= $horloge->Type; ?></td>
                            <td><?= $horloge->Prijs; ?></td>
                            <td><?= $horloge->Materiaal; ?></td>
                            <td><?= $horloge->Waterdichtheid ?></td>
                            <td><?= $horloge->UniekKenmerk ?></td>
                            <td><?= $horloge->Gewicht; ?></td>
                            <td><?= $horloge->Releasedatum; ?></td>
                            <td class="text-center">
                                <a href="<?= URLROOT; ?>/HorlogeController/delete/<?= $horloge->Id;?>">
                                    <i class="bi bi-trash3-fill text-danger"></i>
                                </a>
                            </td>
                            <td class="text-center">
                                <a href="<?= URLROOT; ?>/HorlogeController/update/<?= $horloge->Id;?>">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

                <a href="<?= URLROOT; ?>/homepages/index" class="btn btn-outline-secondary">
                    <i class="bi bi-arrow-left"></i> Terug naar homepage
                </a>
        </div>
    </div>
</div>

<?php require_once APPROOT . '/views/includes/footer.php'; ?>