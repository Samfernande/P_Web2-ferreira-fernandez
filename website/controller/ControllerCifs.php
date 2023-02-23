<?php 

include_once "Controller.php";
include_once "model/ModelCif.php";
include_once "model/ModelUser.php";


class ControllerCifs extends Controller{
    private $cif;

    public function __construct() {
        $this->cif = new ModelCif();
        $this->view = new View();

        $array = $this->cif->getAllCifs();
        $this->view->render('cifs.php', $array);
    }
    
}

?>