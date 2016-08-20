<?php
namespace App;

class ControllerList extends \App\Controller
{
    public function __construct()
    {
        $this->model = new ModelList();
        $this->view = new View();
    }
    
    public function actionIndex()
    {
        $data = $this->model->getData();
        $this->view->generate('listView.php', 'templateView.php', $data);
    }
}