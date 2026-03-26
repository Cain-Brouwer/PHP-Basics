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
    
    public function create()
    {
        $data = [
            'title' => 'Nieuwe smartphone toevoegen',
            'display' => 'none',
            'message' => ''
        ];

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST['merk']) ||
                empty($_POST['model']) ||
                empty($_POST['prijs']) ||
                empty($_POST['geheugen']) ||
                empty($_POST['besturingssysteem']) ||
                empty($_POST['schermgrootte']) ||
                empty($_POST['releasedatum']) ||
                empty($_POST['megapixels'])) {

                $data['display'] = 'flex';
                $data['message'] = 'Vul alle velden in.';

            }
            else {
                $data['display'] = 'flex';
                $data['message'] = 'de gegevens zijn opgeslagen.';

                $this->smartphoneModel->create($_POST);

                header('Refresh:3 ; url=' . URLROOT . '/SmartphoneController/index');
            }
        }

        $this->view('smartphone/create', $data);
    }

    public function update($Id)
    {
        $data = [
            'title' => 'Smartphone aanpassen',
            'display' => 'none',
            'message' => '',
            'result' => $this->smartphoneModel->getSmartphoneById($Id)
        ];

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST['merk']) ||
                empty($_POST['model']) ||
                empty($_POST['prijs']) ||
                empty($_POST['geheugen']) ||
                empty($_POST['besturingssysteem']) ||
                empty($_POST['schermgrootte']) ||
                empty($_POST['releasedatum']) ||
                empty($_POST['megapixels'])) {

                $data['display'] = 'flex';
                $data['message'] = 'Vul alle velden in.';

            }
            else {
                $data['display'] = 'flex';
                $data['message'] = 'de gegevens zijn aangepast.';

                $this->smartphoneModel->update($Id, $_POST);

                header('Refresh:3 ; url=' . URLROOT . '/SmartphoneController/index');
            }
        }

        $this->view('smartphone/update', $data);


    }

    }