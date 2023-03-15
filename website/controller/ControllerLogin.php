<?php 
/**
 * Auteur : João Ferreira & Samuel Fernandez
 * Date : 10.03.2023
 * Description : Contrôleur de la page de connexion et inscription
 */

include_once "Controller.php";
include_once "model/ModelUser.php";

class ControllerLogin extends Controller
{
    private $model;
    private $data;
    private $checkConnection;

    /**
    * Constructeur de la classe ControllerLogin, donne des variables de model à la view, génére la page spécifique
    */
    public function __construct() {
        $this->view = new View();
        $this->model = new ModelUser();
        $this->getLogin();
        $this->register();
        $this->view->render('login.php', "");

    }

    /**
     * Prendre les données du formulaire de login, et faire la connexion pour vérifier que l'utilisateur de la base de données est le correcte
    */
    private function getLogin() 
    {
        // si les champs saisies sont vides, restent vide
        $username =  $_POST['username'] ?? '';
        $password =  $_POST['password'] ?? '';

        // hash du mot de passe en SHA1
        $hashedPassword = sha1($password);

        // si les données de l'utilisateurs ont été saisies
        if(!empty($username) || !empty($password)) 
        {   
            // parcourir la table utilisateurs de la DB
            foreach ($this->model->getUser() as $userKey)
            {   
                // si les données correspondent avec ce qui existe dans la base de données, il se connecte
                if (strtolower($userKey['utiPseudo']) == strtolower($username) && $userKey['utiMotDePasse'] == $hashedPassword)
                {
                    $_SESSION['isConnected'] = 1;
                    $_SESSION['idUtilisateur'] = $userKey['idUtilisateur'];
                    $_SESSION['showConnection'] = true;
                    header('Location: ?link=index');
                    exit();
                } 
                // si non, on lui dit de répeter
                else {
                    $_SESSION['incorrectLogin'] = true;
                }

            }
        }
    }

    /**
     * Prendre les données du formulaire d'inscription, et faire l'inscription pour ajouter l'utilisateur dans la base de données
    */
    private function register() {
        $username = $_POST['userRegister'] ?? '';
        $password = $_POST['passwordRegister'] ?? '';
        $repeatPassword = $_POST['repeatPasswordRegister'] ?? '';

        // Si formulaire valide
        if(!empty($username) || !empty($password)) {

            // Cherche dans les utilisateurs si le nom donné correspond
            foreach ($this->model->getUser() as $userKey) 
            {
                // Si oui, sort directement et doit tout refaire
                if (strtolower($username) == strtolower($userKey['utiPseudo'])) {
                    $_SESSION['sameUser'] = true;
                    header('Location: ?link=login');
                    exit();
                }
            }

            if($password != $repeatPassword)
            {
                $_SESSION['notSamePassword'] = true;
                header('Location: ?link=login');
                exit();
            }

            // Si pas le même nom, ajoute dans la db puis créé la session et attribue l'id utilisateur au pseudo donné puis redirige vers index
            $this->model->addUser($username, $password);
            $_SESSION['isConnected'] = 1;

            foreach ($this->model->getUser() as $userKey)
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

}


?>