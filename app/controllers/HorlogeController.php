<?php

class HorlogeController extends BaseController
{
    public function __construct()
    {
        $this->HorlogesModel = $this->model('Horloges');
    }

    public function index($display='none', $message='')
    {
        $result = $this->HorlogesModel->getAllHorloges();

        $data = [
            'title' => 'Mooie Horloges',
            'display' => $display,
            'message' => $message,
            'result' => $result,
        ];

        $this->view('horloges/index', $data);
    }

        public function create()
    {
        $data = [
            'title' => 'Nieuw horloge toevoegen',
            'display' => 'none',
            'message' => ''
        ];

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST['merk']) ||
                empty($_POST['model']) ||
                empty($_POST['prijs']) ||
                empty($_POST['materiaal']) ||
                empty($_POST['gewicht']) ||
                empty($_POST['waterdichtheid']) ||
                empty($_POST['releasedatum']) ||
                empty($_POST['type']) || 
                empty($_POST['uniekkenmerk'])){

                $data['display'] = 'flex';
                $data['message'] = 'Vul alle velden in.';

            }
            else {
                $data['display'] = 'flex';
                $data['message'] = 'de gegevens zijn opgeslagen.';

                $this->HorlogesModel->create($_POST);

                header('Refresh:3 ; url=' . URLROOT . '/HorlogeController/index');
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
        
    }
