<?php
namespace App;

class ControllerMain extends \App\Controller {
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
            $errors = $this->model->setData($data);
        }
        $data = $this->model->getData();
        if (strlen($errors) != 0) {
            //echo 'Some your data was wrong, try again!';
            $this->view->generate('mainView.php', 'templateView.php', $errors);
        }
        $this->view->generate('mainView.php', 'templateView.php', $data);
    }
}