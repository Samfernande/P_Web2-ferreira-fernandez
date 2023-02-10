<?php

include_once "ControllerLogin.php";
include_once "ControllerMain.php";

// Classe controller permettant d'intéragir avec les modèles et ajouter les données dans view

class Controller {

    protected $view;
    private $actualController;
    
    public function __construct() {

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
                    $this->actualController = new ControllerLogin();
                    break;
                case 'addCIF':
                    $this->actualController = new ControllerLogin();
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

}