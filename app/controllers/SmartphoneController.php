<?php       

    class SmartphoneController extends BaseController
    {
        public function __construct()
        {
            $this->smartphoneModel = $this->model('Smartphone')
        }

        public function index()
        {

        $result = $this->smartphoneModel->getAllSmartphones();

        var_dump($result);

            $data = [
                'title' => 'Overzicht Smartphones',
            ];

            $this->view('smartphone/index', $data);
        }
    }

?>