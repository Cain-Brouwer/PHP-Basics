<?php require_once APPROOT . '/views/includes/header.php'; ?>

<div class="container">
    <div class="row mt-4 d-flex justify-content-center">
        <div class="col-6">
            <h3 class="text-success"><?php echo $data['title']; ?></h3>
        </div>
    </div>

    <?php if (!empty($data['message'])): ?>
    <div class="row mt-3 d-<?= $data['display']; ?> justify-content-center">
        <div class="col-6">
            <div class="alert alert-<?= $data['alert_type']; ?>" role="alert">
                <?= $data['message']; ?>
            </div>
        </div>
    </div>
    <?php endif; ?>

    <div class="row mt-3 d-flex justify-content-center">
        <div class="col-6">
            <form action="<?= URLROOT; ?>/SneakersController/update/<?= $data['sneakers']->Id; ?>" method="post">

                <div class="mb-3">
                    <label for="merk" class="form-label">Merk</label>
                    <input name="merk" type="text" id="merk"
                        class="form-control <?= isset($data['errors']['merk']) ? 'is-invalid' : ''; ?>"
                        value="<?= $_POST['merk'] ?? $data['sneakers']->Merk; ?>">
                    <?php if (isset($data['errors']['merk'])): ?>
                        <div class="invalid-feedback"><?= $data['errors']['merk']; ?></div>
                    <?php endif; ?>
                </div>

                <div class="mb-3">
                    <label for="model" class="form-label">Model</label>
                    <input name="model" type="text" id="model"
                        class="form-control <?= isset($data['errors']['model']) ? 'is-invalid' : ''; ?>"
                        value="<?= $_POST['model'] ?? $data['sneakers']->Model; ?>">
                    <?php if (isset($data['errors']['model'])): ?>
                        <div class="invalid-feedback"><?= $data['errors']['model']; ?></div>
                    <?php endif; ?>
                </div>

                <div class="mb-3">
                    <label for="prijs" class="form-label">Prijs</label>
                    <input name="prijs" type="number" min="0" max="9999" step="0.01" id="prijs"
                        class="form-control <?= isset($data['errors']['prijs']) ? 'is-invalid' : ''; ?>"
                        value="<?= $_POST['prijs'] ?? $data['sneakers']->Prijs; ?>">
                    <?php if (isset($data['errors']['prijs'])): ?>
                        <div class="invalid-feedback"><?= $data['errors']['prijs']; ?></div>
                    <?php endif; ?>
                </div>

                <div class="mb-3">
                    <label for="materiaal" class="form-label">Materiaal</label>
                    <input name="materiaal" type="text" id="materiaal"
                        class="form-control <?= isset($data['errors']['materiaal']) ? 'is-invalid' : ''; ?>"
                        value="<?= $_POST['materiaal'] ?? $data['sneakers']->Materiaal; ?>">
                    <?php if (isset($data['errors']['materiaal'])): ?>
                        <div class="invalid-feedback"><?= $data['errors']['materiaal']; ?></div>
                    <?php endif; ?>
                </div>

                <div class="mb-3">
                    <label for="gewicht" class="form-label">Gewicht (gram)</label>
                    <input name="gewicht" type="number" min="0" max="999" step="0.01" id="gewicht"
                        class="form-control <?= isset($data['errors']['gewicht']) ? 'is-invalid' : ''; ?>"
                        value="<?= $_POST['gewicht'] ?? $data['sneakers']->Gewicht; ?>">
                    <?php if (isset($data['errors']['gewicht'])): ?>
                        <div class="invalid-feedback"><?= $data['errors']['gewicht']; ?></div>
                    <?php endif; ?>
                </div>

                <div class="mb-3">
                    <label for="releasedatum" class="form-label">Releasedatum</label>
                    <input name="releasedatum" type="date" id="releasedatum"
                        class="form-control <?= isset($data['errors']['releasedatum']) ? 'is-invalid' : ''; ?>"
                        value="<?= $_POST['releasedatum'] ?? $data['sneakers']->Releasedatum; ?>">
                    <?php if (isset($data['errors']['releasedatum'])): ?>
                        <div class="invalid-feedback"><?= $data['errors']['releasedatum']; ?></div>
                    <?php endif; ?>
                </div>

                <div class="mb-3">
                    <label for="type" class="form-label">Type</label>
                    <input name="type" type="text" id="type"
                        class="form-control <?= isset($data['errors']['type']) ? 'is-invalid' : ''; ?>"
                        value="<?= $_POST['type'] ?? $data['sneakers']->Type; ?>">
                    <?php if (isset($data['errors']['type'])): ?>
                        <div class="invalid-feedback"><?= $data['errors']['type']; ?></div>
                    <?php endif; ?>
                </div>

                <button type="submit" class="btn btn-primary">Verstuur</button>
            </form>

            <a href="<?= URLROOT; ?>/homepages/index"><i class="bi bi-arrow-left"></i></a>
        </div>
    </div>
</div>

<?php if ($data['redirect']): ?>
<script>
    setTimeout(function () {
        window.location.href = '<?= URLROOT; ?>/SneakersController/index';
    }, 3000);
</script>
<?php endif; ?>

<?php require APPROOT . '/views/includes/footer.php'; ?>