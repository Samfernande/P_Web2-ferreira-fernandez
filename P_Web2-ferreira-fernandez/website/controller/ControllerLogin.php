<?php 

include_once "Controller.php";
include_once "model/ModelUser.php";
include_once "view/view.php";

class ControllerLogin extends Controller
{
    private $user;

    public function __construct() {
        $this->view = new View();
        $this->view->render('login.php', "");
    }
}


?>