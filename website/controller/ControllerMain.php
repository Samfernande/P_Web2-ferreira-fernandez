<?php 

include_once "Controller.php";
include_once "model/ModelCif.php";
include_once "model/ModelUser.php";
include_once "view/view.php";

class ControllerMain extends Controller{
    private $cif;

    public function __construct() {
        $this->cif = new ModelCif();
        $this->view = new View();

        $array = $this->cif->getLimitCif(5);
        $this->view->render('main.php', $array);
    }

}


?>