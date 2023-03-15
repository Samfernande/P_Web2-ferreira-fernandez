<?php
/**
 * Auteur : João Ferreira & Samuel Fernandez
 * Date : 10.03.2023
 * Description : Classe contrôleur principale permettant d'appeller les contrôleurs par rapport à la bonne page.
 */

include_once "ControllerLogin.php";
include_once "ControllerMain.php";
include_once "ControllerCifs.php";
include_once "ControllerAdd.php";
include_once "ControllerDetailCif.php";
include_once "ControllerUserProfile.php";
include_once "ControllerError.php";


class Controller {

    protected $view;
    private $actualController;
    private $connection;
    
    /**
     * Constructeur de la classe Controller, à chaque actualisation, observe si l'utilisateur souhaite se déconnecter
    */
    public function __construct() {
        $this->disconnect();
    }

     /**
     * Création d'un controller et assignation des controllers aux pages
    */
    public function CreateController() 
    {
        // Récupère le lien sur lequel l'utilisateur a cliqué
        if(isset($_GET['link'])) {
            $link = $_GET['link'];

            // Instancie le controlleur correspondant à la bonne page
            // Pour les pages demandant un accès authentifié, regarde d'abord si ce dernier possède bien une session, si non, renvoie sur la page d'erreir
            switch ($link) 
            {
                case 'index':
                    $this->actualController = new ControllerMain();
                    break;
                case 'login':
                    !isset($_SESSION['idUtilisateur']) ? $this->actualController = new ControllerLogin() : $this->actualController = new ControllerError();
                    break;
                case 'allCIF':
                    $this->actualController = new ControllerCifs();
                    break;
                case 'addCIF':
                        isset($_SESSION['idUtilisateur']) ? $this->actualController = new ControllerAdd() : $this->actualController = new ControllerError();

                    break;
                case 'detailCIF':
                    $this->actualController = new ControllerDetailCif();
                    break;
                case 'userProfile':
                    $this->actualController = new ControllerUserProfile();
                    break;
                default:
                    $this->actualController = new ControllerError();
                    break;
            }
            // Sinon instancie le controlleur main
        } 
        else 
        {
            $this->actualController = new ControllerMain();
        }
    }


     /**
     * Méthode qui vide la Session, pour se déconnecter du compte
    */
    public function disconnect()
    {
        if (isset($_GET['connection']))
        {
            $this->connection = $_GET['connection'] ?? '';
            
            if($this->connection == 'false')
            {
                $_SESSION = [];
            }
        }

        
    }

}