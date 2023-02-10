<?php 

include_once "Controller.php";
include_once "model/ModelUser.php";
include_once "view/view.php";

class ControllerCheck extends Controller
{
    private $user;
    private $data;

    public function __construct() {
        $this->view = new View();
        $this->view->render('checkLogin.php', $this->data);
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
                if (strtolower($userKey['utiPseudo']) == strtolower($username))
                {
                    session_start();
                    $_SESSION['isConnected'] = 1;
                    $this->data = 'Connexion réussie !';
                    exit();
                }

            }

            header('Location: ?link=login');
            exit();


        }
    }
}


?>