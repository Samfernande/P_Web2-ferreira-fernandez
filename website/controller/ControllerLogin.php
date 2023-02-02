<?php 

include_once "Controller.php";
include_once "model/ModelCategorie.php";
include_once "view/view.php";

class ControllerLogin extends Controller{

    public function __construct() {

        $this->view = new View();
        $this->view->render('login.php');
    }
}


?>