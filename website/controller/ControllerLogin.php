<?php 

include_once "Controller.php";
include_once "model/ModelUser.php";

class ControllerLogin extends Controller
{
    private $user;
    private $data;
    private $checkConnection;


    public function __construct() {
        $this->view = new View();
        $this->user = new ModelUser();
        $this->getLogin();
        $this->register();
        $this->view->render('login.php', "");

    }

    private function getLogin() 
    {
        $username =  $_POST['username'] ?? '';
        $password =  $_POST['password'] ?? '';

        $hashedPassword = sha1($password);

        if(!empty($username) || !empty($password)) 
        {
            foreach ($this->user->getUser() as $userKey)
            {
                if (strtolower($userKey['utiPseudo']) == strtolower($username) && $userKey['utiMotDePasse'] == $hashedPassword)
                {
                    $_SESSION['isConnected'] = 1;
                    $_SESSION['idUtilisateur'] = $userKey['idUtilisateur'];
                    $_SESSION['showConnection'] = true;
                    header('Location: ?link=index');
                    $this->showSuccessLogin();
                    exit();
                }
                else {
                    $_SESSION['incorrectLogin'] = true;
                }

            }
        }
    }

    private function register() {
        $username = $_POST['userRegister'] ?? '';
        $password = $_POST['passwordRegister'] ?? '';

        // Si formulaire valide
        if(!empty($username) || !empty($password)) {

            // Cherche dans les utilisateurs si le nom donné correspond
            foreach ($this->user->getUser() as $userKey) 
            {
                // Si oui, sort directement et doit tout refaire
                if (strtolower($username) == strtolower($userKey['utiPseudo'])) {
                    $_SESSION['sameUser'] = true;
                    header('Location: ?link=login');
                    exit();
                }
            }

            // Si pas le même nom, ajoute dans la db puis créé la session et attribue l'id utilisateur au pseudo donné puis redirige vers index
            $this->user->addUser($username, $password);
            $_SESSION['isConnected'] = 1;

            foreach ($this->user->getUser() as $userKey)
            {
                if (strtolower($username) == strtolower($userKey['utiPseudo'])){
                    $_SESSION['idUtilisateur'] = $userKey['idUtilisateur'];
                    $_SESSION['showConnection'] = true;
                    break;
                }
            }
        
            header('Location: ?link=index');
            exit();

        }
    }

    private function showSuccessLogin()
    {

    }
}


?>