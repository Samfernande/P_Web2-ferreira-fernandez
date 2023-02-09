<?php 

include_once "Controller.php";
include_once "model/ModelCategorie.php";
include_once "model/ModelCif.php";
include_once "model/ModelUser.php";

class ControllerMain extends Controller{
    private $cif;

    public function __construct() {
        $this->cif = new ModelCif();
        $this->view = new View($this->cif->getCif(5));
        $this->view->render('main.php');

    }
}


?>