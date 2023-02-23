<?php 

include_once "Controller.php";
include_once "model/ModelCif.php";
include_once "model/ModelUser.php";


class ControllerAdd extends Controller{
    private $cif;

    public function __construct() {
        $this->cif = new ModelCif();
        $this->view = new View();

        $this->view->render('addCif.php', "");
    }

    


  
}




?>