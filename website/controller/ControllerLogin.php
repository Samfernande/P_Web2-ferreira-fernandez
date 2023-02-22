<?php 

include_once "Controller.php";
include_once "model/ModelUser.php";
include_once "view/view.php";

class ControllerLogin extends Controller
{
    private $user;
    private $data;
    private $checkConnection;


    public function __construct() {
        $this->view = new View();
        $this->user = new ModelUser();
        $this->GetLogin();
        $this->view->render('login.php', "");

    }

    private function GetLogin() 
    {
        $username =  $_POST['username'];
        $password =  $_POST['password'];

        if(!empty($username) || !empty($password)) 
        {

            foreach ($this->user->getUser() as $userKey)
            {
                if (strtolower($userKey['utiPseudo']) == strtolower($username) && $userKey['utiMotDePasse'] == $password)
                {
                    $_SESSION['isConnected'] = 1;
                    $_SESSION['idUtilisateur'] = $userKey['idUtilisateur'];
                    header('Location: ?link=index');
                    exit();
                }

            }

            //header('Location: ?link=login');
        }
    }
}


?>