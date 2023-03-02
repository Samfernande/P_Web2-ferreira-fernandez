<?php 

include_once "Controller.php";
include_once "model/ModelUser.php";
include_once "model/ModelEvaluation.php";



class ControllerUserProfile extends Controller
{
    private $model;


    public function __construct() {
        $this->view = new View();
        $this->model = new ModelUser();

        $this->view->render('userProfile.php', "");

    }
}



?>
