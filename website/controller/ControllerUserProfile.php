<?php 
/**
 * Auteur : João Ferreira & Samuel Fernandez
 * Date : 10.03.2023
 * Description : Contrôleur de la page de détails d'utilisateur
 */

include_once "Controller.php";
include_once "model/ModelUser.php";
include_once "model/ModelEvaluation.php";
include_once "model/ModelCif.php";

// hérite de la classe Controller
class ControllerUserProfile extends Controller
{
    private $model;
    private $data;
    private $idUser;

     /**
    * Constructeur de la classe ControllerUserProfile, donne des variables de model à la view, génére la page spécifique
    */
    public function __construct() {

        $this->idUser = $_GET['idUser'] ? $_GET['idUser'] : '';

        $this->view = new View();
        $this->model['modelUser'] = new ModelUser();
        $this->model['modelCif'] = new ModelCif();
        $this->model['modelEvaluation'] = new ModelEvaluation();

        $this->data['user'] = $this->getUser() != '' ? $this->getUser() : header('Location: website?link=error');

        $this->data['cif'] = $this->getNbCifs();

        $this->data['evaluation'] = $this->getNbEval();

        $this->data['average'] = $this->getAverage();


        $this->view->render('userProfile.php', $this->data);

    }

    // Permet de récupérer l'utilisateur par rapport à son ID
    function getUser()
    {
        return $this->model['modelUser']->getUserById($this->idUser);
    }

    // Permet de récupérer le nombre d'évaluations de l'utilisateur
    function getNbEval()
    {
        return $this->model['modelEvaluation']->getEvaluationByUserId($this->idUser);
    }

    // Permet de récupérer le nombre de CIFs de l'utilisateur
    function getNbCifs()
    {
        return $this->model['modelCif']->getCifsByUserId($this->idUser);
    }

    // Permet de récupérer la moyenne des évaluations qu'a reçu l'utilisateur
    function getAverage()
    {
        $average = [];

        foreach($this->data['cif'] as $cif)
        {
            array_push($average, $cif['average']);
        }

        return round(array_sum($average)/count($this->data['cif']), 2);

    }

}



?>
