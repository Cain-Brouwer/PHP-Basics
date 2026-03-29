<?php

class HorlogeController extends BaseController
{
    public function __construct()
    {
        $this->HorlogesModel = $this->model('Horloges');
    }

    public function index($display='none', $message='')
    {
        $message = str_replace('_', ' ', $message);
        $result = $this->HorlogesModel->getAllHorloges();

        $data = [
            'title'   => 'Mooie Horloges',
            'display' => $display,
            'message' => $message,
            'result'  => $result,
        ];

        $this->view('horloges/index', $data);
    }

    public function create()
    {
        $data = [
            'title'      => 'Nieuw horloge toevoegen',
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
            } elseif (!is_numeric($_POST['prijs']) || $_POST['prijs'] <= 0 || $_POST['prijs'] > 999999.99) {
                $errors['prijs'] = 'Voer een geldige prijs in (0,01 - 999999,99)';
            }

            if (empty(trim($_POST['materiaal']))) {
                $errors['materiaal'] = 'Voer een materiaal in';
            } elseif (strlen($_POST['materiaal']) < 2) {
                $errors['materiaal'] = 'Materiaal moet minimaal 2 tekens bevatten';
            } elseif (strlen($_POST['materiaal']) > 50) {
                $errors['materiaal'] = 'Materiaal mag maximaal 50 tekens bevatten';
            }

            if (empty($_POST['gewicht'])) {
                $errors['gewicht'] = 'Voer een gewicht in';
            } elseif (!is_numeric($_POST['gewicht']) || $_POST['gewicht'] <= 0 || $_POST['gewicht'] > 9999.99) {
                $errors['gewicht'] = 'Voer een geldig gewicht in (0,01 - 9999,99 gram)';
            }

            if (empty(trim($_POST['waterdichtheid']))) {
                $errors['waterdichtheid'] = 'Voer een waterdichtheid in';
            } elseif (strlen($_POST['waterdichtheid']) < 2) {
                $errors['waterdichtheid'] = 'Waterdichtheid moet minimaal 2 tekens bevatten';
            } elseif (strlen($_POST['waterdichtheid']) > 20) {
                $errors['waterdichtheid'] = 'Waterdichtheid mag maximaal 20 tekens bevatten';
            }

            if (empty($_POST['releasedatum'])) {
                $errors['releasedatum'] = 'Voer een releasedatum in';
            } elseif (!DateTime::createFromFormat('Y-m-d', $_POST['releasedatum'])) {
                $errors['releasedatum'] = 'Voer een geldige datum in (jjjj-mm-dd)';
            } elseif (strtotime($_POST['releasedatum']) > time()) {
                $errors['releasedatum'] = 'Releasedatum mag niet in de toekomst liggen';
            }

            if (empty(trim($_POST['type']))) {
                $errors['type'] = 'Voer een type in';
            } elseif (strlen($_POST['type']) < 2) {
                $errors['type'] = 'Type moet minimaal 2 tekens bevatten';
            } elseif (strlen($_POST['type']) > 50) {
                $errors['type'] = 'Type mag maximaal 50 tekens bevatten';
            }

            if (empty(trim($_POST['uniekkenmerk']))) {
                $errors['uniekkenmerk'] = 'Voer een uniek kenmerk in';
            } elseif (strlen($_POST['uniekkenmerk']) < 2) {
                $errors['uniekkenmerk'] = 'Uniek kenmerk moet minimaal 2 tekens bevatten';
            } elseif (strlen($_POST['uniekkenmerk']) > 255) {
                $errors['uniekkenmerk'] = 'Uniek kenmerk mag maximaal 255 tekens bevatten';
            }

            if (empty($errors)) {
                $this->HorlogesModel->create($_POST);
                $data['display']    = 'flex';
                $data['message']    = 'De gegevens zijn opgeslagen.';
                $data['alert_type'] = 'success';
                header('Refresh:3 ; url=' . URLROOT . '/HorlogeController/index');
            } else {
                $data['errors'] = $errors;
            }
        }

        $this->view('horloges/create', $data);
    }

    public function delete($Id)
    {
        $result = $this->HorlogesModel->delete($Id);
        header('Refresh:3 ; url=' . URLROOT . '/HorlogeController/index');
        $this->index();
    }

    public function update($Id)
    {
        $data = [
            'title'      => 'Horloge aanpassen',
            'display'    => 'none',
            'message'    => '',
            'alert_type' => 'danger',
            'errors'     => [],
            'horloge'    => $this->HorlogesModel->getHorlogeById($Id),
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
            } elseif (!is_numeric($_POST['prijs']) || $_POST['prijs'] <= 0 || $_POST['prijs'] > 999999.99) {
                $errors['prijs'] = 'Voer een geldige prijs in (0,01 - 999999,99)';
            }

            if (empty(trim($_POST['materiaal']))) {
                $errors['materiaal'] = 'Voer een materiaal in';
            } elseif (strlen($_POST['materiaal']) < 2) {
                $errors['materiaal'] = 'Materiaal moet minimaal 2 tekens bevatten';
            } elseif (strlen($_POST['materiaal']) > 50) {
                $errors['materiaal'] = 'Materiaal mag maximaal 50 tekens bevatten';
            }

            if (empty($_POST['gewicht'])) {
                $errors['gewicht'] = 'Voer een gewicht in';
            } elseif (!is_numeric($_POST['gewicht']) || $_POST['gewicht'] <= 0 || $_POST['gewicht'] > 9999.99) {
                $errors['gewicht'] = 'Voer een geldig gewicht in (0,01 - 9999,99 gram)';
            }

            if (empty(trim($_POST['waterdichtheid']))) {
                $errors['waterdichtheid'] = 'Voer een waterdichtheid in';
            } elseif (strlen($_POST['waterdichtheid']) < 2) {
                $errors['waterdichtheid'] = 'Waterdichtheid moet minimaal 2 tekens bevatten';
            } elseif (strlen($_POST['waterdichtheid']) > 20) {
                $errors['waterdichtheid'] = 'Waterdichtheid mag maximaal 20 tekens bevatten';
            }

            if (empty($_POST['releasedatum'])) {
                $errors['releasedatum'] = 'Voer een releasedatum in';
            } elseif (!DateTime::createFromFormat('Y-m-d', $_POST['releasedatum'])) {
                $errors['releasedatum'] = 'Voer een geldige datum in (jjjj-mm-dd)';
            } elseif (strtotime($_POST['releasedatum']) > time()) {
                $errors['releasedatum'] = 'Releasedatum mag niet in de toekomst liggen';
            }

            if (empty(trim($_POST['type']))) {
                $errors['type'] = 'Voer een type in';
            } elseif (strlen($_POST['type']) < 2) {
                $errors['type'] = 'Type moet minimaal 2 tekens bevatten';
            } elseif (strlen($_POST['type']) > 50) {
                $errors['type'] = 'Type mag maximaal 50 tekens bevatten';
            }

            if (empty(trim($_POST['uniekkenmerk']))) {
                $errors['uniekkenmerk'] = 'Voer een uniek kenmerk in';
            } elseif (strlen($_POST['uniekkenmerk']) < 2) {
                $errors['uniekkenmerk'] = 'Uniek kenmerk moet minimaal 2 tekens bevatten';
            } elseif (strlen($_POST['uniekkenmerk']) > 255) {
                $errors['uniekkenmerk'] = 'Uniek kenmerk mag maximaal 255 tekens bevatten';
            }

            if (empty($errors)) {
                $this->HorlogesModel->update($Id, $_POST);
                $data['display']    = 'flex';
                $data['message']    = 'Het record is succesvol opgeslagen.';
                $data['alert_type'] = 'success';
                $data['redirect']   = true;
            } else {
                $data['errors'] = $errors;
            }
        }

        $this->view('horloges/update', $data);
    }
}