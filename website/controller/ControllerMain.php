<?php 

include_once "Controller.php";
include_once "model/ModelCategorie.php";
include_once "model/ModelCif.php";
include_once "model/ModelUser.php";
include_once "view/ViewMain.php";

class ControllerMain extends Controller{
    private $cif;

    public function __construct() {
        $this->cif = new ModelCif();
        $this->view = new ViewMain($this->cif->getCif(5));
        $this->view->render('main.php');

    }
}


?>