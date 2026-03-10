<?php       

    class SmartphoneController extends BaseController
    {
        public function __construct()
        {
            $this->smartphoneModel = $this->model('Smartphone');
        }

        public function index($display='none', $message='')
        {

        $result = $this->smartphoneModel->getAllSmartphones();

            $data = [
                'title' => 'Overzicht Smartphones',
                'display' => $display,
                'message' => $message,
                'result' => $result,
            ];

            $this->view('smartphone/index', $data);
        }

        public function delete($Id)
        {

            $result = $this->smartphoneModel->delete($Id);

            header('Refresh:3 ; url=' . URLROOT . '/smartphoneController/index');

            $this->index();
        }
    }

?>