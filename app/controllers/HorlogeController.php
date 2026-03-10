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

            public function delete($Id)
        {

            $result = $this->HorlogesModel->delete($Id);

            header('Refresh:3 ; url=' . URLROOT . '/HorlogeController/index');

            $this->index();
        }
    }