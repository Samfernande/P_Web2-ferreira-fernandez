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
        //$this->GetLogin();
        //$this->register();


    }

    /*private function GetLogin() 
    {
        $username = $_POST['username'] ?? '';
        $password = $_POST['password'] ?? '';

        if(!empty($username) || !empty($password)) 
        {
            foreach ($this->user->getUser() as $userKey)
            {
                if (strtolower($userKey['utiPseudo']) == strtolower($username) && $userKey['utiMotDePasse'] == $password)
                {
                    $_SESSION['isConnected'] = 1;
                    $_SESSION['idUtilisateur'] = $userKey['idUtilisateur'];

                    $this->data = 'Connexion réussie !';
                    exit();
                }

            }

            header('Location: ?link=login');
            exit();


        }
    }*/

    private function register() {
        $username = $_POST['userRegister'] ?? '';
        $password = $_POST['passwordRegister'] ?? '';
        if(!empty($username) || !empty($password)) {

            foreach ($this->user->getUser() as $userKey) {
                if (strtolower($username) == strtolower($userKey['utiPseudo'])){
                    $sameUser = true;
                }
            }

            if (!isset($sameUser)) {
                $this->user->addUser($username, $password);
                $_SESSION['isConnected'] = 1;

                foreach ($this->user->getUser() as $userKey)
                {
                    if (strtolower($username) == strtolower($userKey['utiPseudo'])){
                        $_SESSION['idUtilisateur'] = $userKey['idUtilisateur'];
                    }
                }

                $this->data = 'Connexion réussie !';
                exit();
            }
            


            header('Location: ?link=login');
            exit();
        }
    }
}


?>