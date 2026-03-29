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
            <form action="<?= URLROOT; ?>/SmartphoneController/update/<?= $data['smartphone']->Id; ?>" method="post">

                <div class="mb-3">
                    <label for="merk" class="form-label">Merk</label>
                    <input name="merk" type="text" id="merk"
                        class="form-control <?= isset($data['errors']['merk']) ? 'is-invalid' : ''; ?>"
                        value="<?= $_POST['merk'] ?? $data['smartphone']->Merk; ?>">
                    <?php if (isset($data['errors']['merk'])): ?>
                        <div class="invalid-feedback"><?= $data['errors']['merk']; ?></div>
                    <?php endif; ?>
                </div>

                <div class="mb-3">
                    <label for="model" class="form-label">Model</label>
                    <input name="model" type="text" id="model"
                        class="form-control <?= isset($data['errors']['model']) ? 'is-invalid' : ''; ?>"
                        value="<?= $_POST['model'] ?? $data['smartphone']->Model; ?>">
                    <?php if (isset($data['errors']['model'])): ?>
                        <div class="invalid-feedback"><?= $data['errors']['model']; ?></div>
                    <?php endif; ?>
                </div>

                <div class="mb-3">
                    <label for="prijs" class="form-label">Prijs</label>
                    <input name="prijs" type="number" min="0" max="9999" step="0.01" id="prijs"
                        class="form-control <?= isset($data['errors']['prijs']) ? 'is-invalid' : ''; ?>"
                        value="<?= $_POST['prijs'] ?? $data['smartphone']->Prijs; ?>">
                    <?php if (isset($data['errors']['prijs'])): ?>
                        <div class="invalid-feedback"><?= $data['errors']['prijs']; ?></div>
                    <?php endif; ?>
                </div>

                <div class="mb-3">
                    <label for="geheugen" class="form-label">Geheugen (GB)</label>
                    <input name="geheugen" type="number" min="0" max="4000" id="geheugen"
                        class="form-control <?= isset($data['errors']['geheugen']) ? 'is-invalid' : ''; ?>"
                        value="<?= $_POST['geheugen'] ?? $data['smartphone']->Geheugen; ?>">
                    <?php if (isset($data['errors']['geheugen'])): ?>
                        <div class="invalid-feedback"><?= $data['errors']['geheugen']; ?></div>
                    <?php endif; ?>
                </div>

                <div class="mb-3">
                    <label for="besturingssysteem" class="form-label">Besturingssysteem</label>
                    <input name="besturingssysteem" type="text" id="besturingssysteem"
                        class="form-control <?= isset($data['errors']['besturingssysteem']) ? 'is-invalid' : ''; ?>"
                        value="<?= $_POST['besturingssysteem'] ?? $data['smartphone']->Besturingssysteem; ?>">
                    <?php if (isset($data['errors']['besturingssysteem'])): ?>
                        <div class="invalid-feedback"><?= $data['errors']['besturingssysteem']; ?></div>
                    <?php endif; ?>
                </div>

                <div class="mb-3">
                    <label for="schermgrootte" class="form-label">Schermgrootte</label>
                    <input name="schermgrootte" type="number" min="0" max="10" step="0.01" id="schermgrootte"
                        class="form-control <?= isset($data['errors']['schermgrootte']) ? 'is-invalid' : ''; ?>"
                        value="<?= $_POST['schermgrootte'] ?? $data['smartphone']->Schermgrootte; ?>">
                    <?php if (isset($data['errors']['schermgrootte'])): ?>
                        <div class="invalid-feedback"><?= $data['errors']['schermgrootte']; ?></div>
                    <?php endif; ?>
                </div>

                <div class="mb-3">
                    <label for="releasedatum" class="form-label">Releasedatum</label>
                    <input name="releasedatum" type="date" id="releasedatum"
                        class="form-control <?= isset($data['errors']['releasedatum']) ? 'is-invalid' : ''; ?>"
                        value="<?= $_POST['releasedatum'] ?? $data['smartphone']->Releasedatum; ?>">
                    <?php if (isset($data['errors']['releasedatum'])): ?>
                        <div class="invalid-feedback"><?= $data['errors']['releasedatum']; ?></div>
                    <?php endif; ?>
                </div>

                <div class="mb-3">
                    <label for="megapixels" class="form-label">Megapixels</label>
                    <input name="megapixels" type="number" min="0" max="200" id="megapixels"
                        class="form-control <?= isset($data['errors']['megapixels']) ? 'is-invalid' : ''; ?>"
                        value="<?= $_POST['megapixels'] ?? $data['smartphone']->MegaPixels; ?>">
                    <?php if (isset($data['errors']['megapixels'])): ?>
                        <div class="invalid-feedback"><?= $data['errors']['megapixels']; ?></div>
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
        window.location.href = '<?= URLROOT; ?>/SmartphoneController/index';
    }, 3000);
</script>
<?php endif; ?>

<?php require APPROOT . '/views/includes/footer.php'; ?>