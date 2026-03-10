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
}