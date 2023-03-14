<?php 
/**
 * Auteur : João Ferreira & Samuel Fernandez
 * Date : 10.03.2023
 * Description : Contrôleur de la page d'accueil
 */

include_once "Controller.php";
include_once "model/ModelCif.php";
include_once "model/ModelUser.php";
include_once "view/view.php";

// hérite de la classe Controller
class ControllerMain extends Controller{
    private $cif;

     /**
    * Constructeur de la classe ControllerMain, donne des variables de model à la view, génére la page spécifique
    */
    public function __construct() {
        $this->cif = new ModelCif();
        $this->view = new View();

        // récupération des 5 derniers CIFs
        $array = $this->cif->getLimitCif(5);
        $this->view->render('main.php', $array);
    }

}


?>