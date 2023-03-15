<?php 
/**
 * Auteur : João Ferreira & Samuel Fernandez
 * Date : 10.03.2023
 * Description : Contrôleur de la page d'erreurs
 */

include_once "Controller.php";
include_once "model/model.php";
include_once "model/ModelUser.php";

// hérite de la classe Controller
class ControllerError extends Controller{

    /**
     * Constructeur de la classe ControllerError, génére la page d'erreurs
    */
    public function __construct() {

        $this->view = new View();

        $this->view->render('error.php', '');
    }

}




?>