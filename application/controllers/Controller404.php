<?php
namespace App;

class Controller404 extends \App\Controller
{
    public function actionIndex()
    {   
        $this->view->generate('404View.php', 'templateView.php');
    }
}
?>