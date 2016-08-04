<?php
class ControllerMain extends Controller {
    public function __construct()
    {
        $this->model = new ModelMain();
        $this->view = new View();
    }
    public function actionIndex()
    {
        if (array_key_exists('country', $_POST)) {
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $birthday = $_POST['birthday'];
            $country = $_POST['country'];
            $report_subject = $_POST['report_subject'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];
            $company = $_POST['company'];
            $position = $_POST['position'];
            $about_me = $_POST['about_me'];
            $photo = $_FILES['photo'];
            $data = [$firstname, $lastname, $birthday, $report_subject, $country, $phone, $email, $company, $position, $about_me, $photo];
            $this->model->setData($data);
        }
        $data = $this->model->getData();
        $this->view->generate('mainView.php', 'templateView.php', $data);
    }
}