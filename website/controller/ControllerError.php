<?php 

include_once "Controller.php";
include_once "model/model.php";
include_once "model/ModelUser.php";


class ControllerError extends Controller{

    public function __construct() {

        $this->view = new View();

        $this->view->render('error.php', '');
    }

}




?>