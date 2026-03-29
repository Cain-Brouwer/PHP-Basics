<?php       

    class SmartphoneController extends BaseController
    {
        public function __construct()
        {
            $this->smartphoneModel = $this->model('Smartphone');
        }

        public function index($display='none', $message='')
        {
            $message = str_replace('_', ' ', $message);
            $result = $this->smartphoneModel->getAllSmartphones();

            $data = [
                'title'   => 'Overzicht Smartphones',
                'display' => $display,
                'message' => $message,
                'result'  => $result,
            ];

            $this->view('smartphone/index', $data);
        }

        public function delete($Id)
        {
            $result = $this->smartphoneModel->delete($Id);
            header('Refresh:3 ; url=' . URLROOT . '/smartphoneController/index');
            $this->index();
        }

        public function create()
        {
            $data = [
                'title'      => 'Nieuwe smartphone toevoegen',
                'display'    => 'none',
                'message'    => '',
                'alert_type' => 'danger',
                'errors'     => [],
            ];

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $errors = [];

                if (empty(trim($_POST['merk']))) {
                    $errors['merk'] = 'Voer een merk in';
                } elseif (strlen($_POST['merk']) < 2) {
                    $errors['merk'] = 'Merk moet minimaal 2 tekens bevatten';
                } elseif (strlen($_POST['merk']) > 50) {
                    $errors['merk'] = 'Merk mag maximaal 50 tekens bevatten';
                }

                if (empty(trim($_POST['model']))) {
                    $errors['model'] = 'Voer een model in';
                } elseif (strlen($_POST['model']) < 2) {
                    $errors['model'] = 'Model moet minimaal 2 tekens bevatten';
                } elseif (strlen($_POST['model']) > 50) {
                    $errors['model'] = 'Model mag maximaal 50 tekens bevatten';
                }

                if (empty($_POST['prijs'])) {
                    $errors['prijs'] = 'Voer een prijs in';
                } elseif (!is_numeric($_POST['prijs']) || $_POST['prijs'] <= 0 || $_POST['prijs'] > 9999.99) {
                    $errors['prijs'] = 'Voer een geldige prijs in (0,01 - 9999,99)';
                }

                if (empty($_POST['geheugen'])) {
                    $errors['geheugen'] = 'Voer een geheugen in';
                } elseif (!is_numeric($_POST['geheugen']) || $_POST['geheugen'] <= 0 || $_POST['geheugen'] > 4000) {
                    $errors['geheugen'] = 'Voer een geldig geheugen in (1 - 4000 GB)';
                }

                if (empty(trim($_POST['besturingssysteem']))) {
                    $errors['besturingssysteem'] = 'Voer een besturingssysteem in';
                } elseif (strlen($_POST['besturingssysteem']) < 2) {
                    $errors['besturingssysteem'] = 'Besturingssysteem moet minimaal 2 tekens bevatten';
                } elseif (strlen($_POST['besturingssysteem']) > 25) {
                    $errors['besturingssysteem'] = 'Besturingssysteem mag maximaal 25 tekens bevatten';
                }

                if (empty($_POST['schermgrootte'])) {
                    $errors['schermgrootte'] = 'Voer een schermgrootte in';
                } elseif (!is_numeric($_POST['schermgrootte']) || $_POST['schermgrootte'] <= 0 || $_POST['schermgrootte'] > 10) {
                    $errors['schermgrootte'] = 'Voer een geldige schermgrootte in (0,01 - 10 inch)';
                }

                if (empty($_POST['releasedatum'])) {
                    $errors['releasedatum'] = 'Voer een releasedatum in';
                } elseif (!DateTime::createFromFormat('Y-m-d', $_POST['releasedatum'])) {
                    $errors['releasedatum'] = 'Voer een geldige datum in (jjjj-mm-dd)';
                } elseif (strtotime($_POST['releasedatum']) > time()) {
                    $errors['releasedatum'] = 'Releasedatum mag niet in de toekomst liggen';
                }

                if (empty($_POST['megapixels'])) {
                    $errors['megapixels'] = 'Voer het aantal megapixels in';
                } elseif (!is_numeric($_POST['megapixels']) || $_POST['megapixels'] <= 0 || $_POST['megapixels'] > 200) {
                    $errors['megapixels'] = 'Voer een geldig aantal in (1 - 200)';
                }

                if (empty($errors)) {
                    $this->smartphoneModel->create($_POST);
                    $data['display']    = 'flex';
                    $data['message']    = 'De gegevens zijn opgeslagen.';
                    $data['alert_type'] = 'success';
                    header('Refresh:3 ; url=' . URLROOT . '/SmartphoneController/index');
                } else {
                    $data['errors'] = $errors;
                }
            }

            $this->view('smartphone/create', $data);
        }

        public function update($Id)
        {
            $data = [
                'title'      => 'Smartphone aanpassen',
                'display'    => 'none',
                'message'    => '',
                'alert_type' => 'danger',
                'errors'     => [],
                'smartphone' => $this->smartphoneModel->getSmartphoneById($Id),
                'redirect'   => false,
            ];

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $errors = [];

                if (empty(trim($_POST['merk']))) {
                    $errors['merk'] = 'Voer een merk in';
                } elseif (strlen($_POST['merk']) < 2) {
                    $errors['merk'] = 'Merk moet minimaal 2 tekens bevatten';
                } elseif (strlen($_POST['merk']) > 50) {
                    $errors['merk'] = 'Merk mag maximaal 50 tekens bevatten';
                }

                if (empty(trim($_POST['model']))) {
                    $errors['model'] = 'Voer een model in';
                } elseif (strlen($_POST['model']) < 2) {
                    $errors['model'] = 'Model moet minimaal 2 tekens bevatten';
                } elseif (strlen($_POST['model']) > 50) {
                    $errors['model'] = 'Model mag maximaal 50 tekens bevatten';
                }

                if (empty($_POST['prijs'])) {
                    $errors['prijs'] = 'Voer een prijs in';
                } elseif (!is_numeric($_POST['prijs']) || $_POST['prijs'] <= 0 || $_POST['prijs'] > 9999.99) {
                    $errors['prijs'] = 'Voer een geldige prijs in (0,01 - 9999,99)';
                }

                if (empty($_POST['geheugen'])) {
                    $errors['geheugen'] = 'Voer een geheugen in';
                } elseif (!is_numeric($_POST['geheugen']) || $_POST['geheugen'] <= 0 || $_POST['geheugen'] > 4000) {
                    $errors['geheugen'] = 'Voer een geldig geheugen in (1 - 4000 GB)';
                }

                if (empty(trim($_POST['besturingssysteem']))) {
                    $errors['besturingssysteem'] = 'Voer een besturingssysteem in';
                } elseif (strlen($_POST['besturingssysteem']) < 2) {
                    $errors['besturingssysteem'] = 'Besturingssysteem moet minimaal 2 tekens bevatten';
                } elseif (strlen($_POST['besturingssysteem']) > 25) {
                    $errors['besturingssysteem'] = 'Besturingssysteem mag maximaal 25 tekens bevatten';
                }

                if (empty($_POST['schermgrootte'])) {
                    $errors['schermgrootte'] = 'Voer een schermgrootte in';
                } elseif (!is_numeric($_POST['schermgrootte']) || $_POST['schermgrootte'] <= 0 || $_POST['schermgrootte'] > 10) {
                    $errors['schermgrootte'] = 'Voer een geldige schermgrootte in (0,01 - 10 inch)';
                }

                if (empty($_POST['releasedatum'])) {
                    $errors['releasedatum'] = 'Voer een releasedatum in';
                } elseif (!DateTime::createFromFormat('Y-m-d', $_POST['releasedatum'])) {
                    $errors['releasedatum'] = 'Voer een geldige datum in (jjjj-mm-dd)';
                } elseif (strtotime($_POST['releasedatum']) > time()) {
                    $errors['releasedatum'] = 'Releasedatum mag niet in de toekomst liggen';
                }

                if (empty($_POST['megapixels'])) {
                    $errors['megapixels'] = 'Voer het aantal megapixels in';
                } elseif (!is_numeric($_POST['megapixels']) || $_POST['megapixels'] <= 0 || $_POST['megapixels'] > 200) {
                    $errors['megapixels'] = 'Voer een geldig aantal in (1 - 200)';
                }

                if (empty($errors)) {
                    $this->smartphoneModel->update($Id, $_POST);
                    $data['display']    = 'flex';
                    $data['message']    = 'Het record is succesvol opgeslagen.';
                    $data['alert_type'] = 'success';
                    $data['redirect']   = true;
                } else {
                    $data['errors'] = $errors;
                }
            }

            $this->view('smartphone/update', $data);
        }
    }