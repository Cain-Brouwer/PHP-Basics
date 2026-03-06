<?php

class SneakersController extends BaseController
{
    public function __construct()
    {
        $this->sneakersModel = $this->model('Sneakers');
    }

    public function index()
    {
        $result = $this->sneakersModel->getAllSneakers();

        $data = [
            'title' => 'Mooiste Sneakers',
            'result' => $result,
        ];

        $this->view('sneakers/index', $data);
    }
}