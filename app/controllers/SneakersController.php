<?php

class SneakersController extends BaseController
{
    public function __construct()
    {
        $this->sneakersModel = $this->model('Sneakers');
    }

    public function index($display='none', $message='')
    {
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
            'message' => ''
        ];

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST['merk']) ||
                empty($_POST['model']) ||
                empty($_POST['prijs']) ||
                empty($_POST['materiaal']) ||
                empty($_POST['gewicht']) ||
                empty($_POST['release datum']) ||
                empty($_POST['type'])) {

                $data['display'] = 'flex';
                $data['message'] = 'Vul alle velden in.';

            }
            else {
                $data['display'] = 'flex';
                $data['message'] = 'de gegevens zijn opgeslagen.';

                $this->sneakersModel->create($_POST);

                header('Refresh:3 ; url=' . URLROOT . '/SneakersController/index');
            }
        }

        $this->view('sneaker/create', $data);
    }
}   
