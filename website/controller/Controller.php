<?php

include_once "ControllerLogin.php";
include_once "ControllerMain.php";
include_once "ControllerCifs.php";
include_once "ControllerAdd.php";
include_once "ControllerDetailCif.php";

// Classe controller permettant d'intéragir avec les modèles et ajouter les données dans view

class Controller {

    protected $view;
    private $actualController;
    private $connection;
    
    public function __construct() {
        $this->disconnect();
    }

    public function CreateController() 
    {
        // Récupère le lien sur lequel l'utilisateur a cliqué
        if(isset($_GET['link'])) {
            $link = $_GET['link'];

            // Instancie le controlleur correspondant à la bonne page
            switch ($link) 
            {
                case 'index':
                    $this->actualController = new ControllerMain();
                    break;
                case 'login':
                    $this->actualController = new ControllerLogin();
                    break;
                case 'allCIF':
                    $this->actualController = new ControllerCifs();
                    break;
                case 'addCIF':
                    $this->actualController = new ControllerAdd();
                    break;
                case 'detailCIF':
                    $this->actualController = new ControllerDetailCif();
                    break;
                default:
                    $this->actualController = new ControllerMain();
                    break;
            }
            // Sinon instancie le controlleur main
        } 
        else 
        {
            $this->actualController = new ControllerMain();
        }
    }

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