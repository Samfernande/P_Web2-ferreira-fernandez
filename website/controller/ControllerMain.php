<?php 

include_once "Controller.php";
include_once "model/ModelCategorie.php";
include_once "model/ModelCif.php";
include_once "model/ModelUser.php";
include_once "view/view.php";

class ControllerMain extends Controller{
    private $cif;

    public function __construct() {

        $this->view = new View();
        $this->view->render('main.php');
        $this->cif = new ModelCif();
    }
}


?>