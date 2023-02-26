<?php 

include_once "Controller.php";
include_once "model/model.php";
include_once "model/ModelUser.php";


class ControllerAdd extends Controller{
    private $model;
    private $data;

    public function __construct() {
        $this->model = new modelCif();
        $this->view = new View();

        $this->view->render('addCif.php', "");
    }

    


  
}




?>