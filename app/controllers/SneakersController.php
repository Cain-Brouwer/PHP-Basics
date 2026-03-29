<?php

class SneakersController extends BaseController
{
    
    public function __construct()
    {
        $this->sneakersModel = $this->model('Sneakers');
    }

    public function index($display='none', $message='')
    {
        $message = str_replace('_', ' ', $message);
        $result = $this->sneakersModel->getAllSneakers();

        $data = [
            'title' => 'Mooiste Sneakers',
            'display' => $display,
            'message' => $message,
            'result' => $result,
        ];

        $this->view('sneakers/index', $data);
    }

    public function delete($Id)
    {
        $result = $this->sneakersModel->delete($Id);

        header('Refresh:3 ; url=' . URLROOT . '/SneakersController/index');

        $this->index();
    }

    public function create()
    {
        $data = [
            'title' => 'Nieuwe sneakers toevoegen',
            'display' => 'none',
            'message' => '',
            'alert_type' => 'danger',
        ];

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST['merk']) ||
                empty($_POST['model']) ||
                empty($_POST['prijs']) ||
                empty($_POST['materiaal']) ||
                empty($_POST['gewicht']) ||
                empty($_POST['releasedatum']) ||
                empty($_POST['type'])) {

                $data['display'] = 'flex';
                $data['message'] = 'Vul alle velden in.';
                $data['alert_type'] = 'danger';

            }
            else {
                $data['display'] = 'flex';
                $data['message'] = 'de gegevens zijn opgeslagen.';
                $data['alert_type'] = 'success';

                $this->sneakersModel->create($_POST);

                header('Refresh:3 ; url=' . URLROOT . '/SneakersController/index');
            }
        }

        $this->view('sneakers/create', $data);
    }
    
    public function update($Id)
    {
        $data = [
            'title' => 'Sneakers aanpassen',
            'display' => 'none',
            'message' => '',
            'alert_type' => 'danger',
            'sneakers' => $this->sneakersModel->getSneakerById($Id),
            'redirect' => false,
        ];

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST['merk']) ||
                empty($_POST['model']) ||
                empty($_POST['prijs']) ||
                empty($_POST['materiaal']) ||
                empty($_POST['gewicht']) ||
                empty($_POST['releasedatum']) ||
                empty($_POST['type'])) {

                $data['display'] = 'flex';
                $data['message'] = 'Vul alle velden in.';
                $data['alert_type'] = 'danger';

            }
            else {
                $data['display'] = 'flex';
                $data['message'] = 'Het record is succesvol opgeslagen.';
                $data['alert_type'] = 'success';
                $data['redirect'] = true;

                $this->sneakersModel->update($Id, $_POST);
            }
        }

        $this->view('sneakers/update', $data);
    }
}