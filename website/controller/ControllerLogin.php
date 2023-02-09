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
        $this->user = new ModelUser();
        $this->GetLogin();
    }

    private function GetLogin() 
    {
        $username = $_POST['username'] ?? '';
        $password = $_POST['password'] ?? '';

        if(!empty($username) || !empty($password)) 
        {
            foreach ($this->user->getUser() as $userData => $userKey)
            {
                if ($userKey['utiPseudo'] == $username)
                {
                    $_GET['link'] = 'index';
                }
                else
                {
                    $_GET['link'] = 'login';
                }
            }
        }



    }
}


?>