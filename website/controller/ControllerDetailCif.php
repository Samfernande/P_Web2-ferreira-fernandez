<?php 
/**
 * Auteur : João Ferreira & Samuel Fernandez
 * Date : 10.03.2023
 * Description : Contrôleur de la page de détail des CIFs (C'est ici que l'on pourra ajouter une évaluation aux CIFs)
 */

include_once "Controller.php";
include_once "model/ModelUser.php";
include_once "model/ModelEvaluation.php";


// Hérite de la classe Controller

class ControllerDetailCif extends Controller
{
    private $model;
    private $data;

      /**
     * Constructeur de la classe ControllerDetailCif, donne des variables de model à la view, génére la page spécifique
    */
    public function __construct() {
        $this->view = new View();
        $this->model['modelCif'] = new ModelCif();
        $this->model['modelEvaluation'] = new ModelEvaluation();
        $this->data['cif'] = $this->getCif() != '' ? $this->getCif() : header('Location: website?link=error');
        $this->data['evaluation'] = $this->model['modelEvaluation']->getEvaluation();
        $this->getEval();
        $this->alreadyRated();
        $this->sameUser();

        $this->view->render('detailCif.php', $this->data);
    }

    /**
     * Récupération du ID du CIF cliqué à l'aide de la requête dans ModelCif
    */
    function getCif()
    {
        $idCif = $_GET['idCif'];
        

        if(ctype_digit($idCif))
            return $this->model['modelCif']->getCifByID($idCif);
        else
            return '';

    }

     /**
     * Récupération de la moyenne d'évaluations du CIF cliqué à l'aide de la requête dans ModelEvaluation
    */
    function getEval()
    {
        if(isset($_SESSION['idUtilisateur']))
        {
            if (isset($_POST['ratingInput'])) 
            {
              

                $rating = $_POST['ratingInput'];

                $this->model['modelEvaluation']->addEvaluation($_SESSION['idUtilisateur'], $_GET['idCif'], $rating);
                
              
                
                header("Location: #");
                exit();
                
            }
        }
        else
        {
            if ($_SERVER["REQUEST_METHOD"] === "POST") {
                $this->data['msgNoConnection'] = true;   
            }
      
        }
    }

     /**
     * Vérification si l'utilisateur a déjà évalué le CIF ou pas, si oui, ne peut pas l'évaluer
    */
    function alreadyRated()
    {
        if(isset($_SESSION['idUtilisateur']))
        {
            foreach ($this->data['evaluation'] as $eval)
            {
                if($_SESSION['idUtilisateur'] == $eval['fkUtilisateur'] && $eval['fkCif'] == $_GET['idCif'])
                {
                    $this->data['alreadyRated'] = true;
                    break;
                }
                else
                {
                    $this->data['alreadyRated'] = false;
                }
            }
        }
        else
        {
            $this->data['alreadyRated'] = false;
        }
        
    }

     /**
     * Vérification si l'utilisateur a créer le CIF ou pas, si oui, ne peut pas l'évaluer
    */
    function sameUser() {
        $idCif = $_GET['idCif'];
        $fkUtilisateur = $this->model['modelCif']->getCifByID($idCif)['idUtilisateur'];
        
        if(isset($_SESSION['idUtilisateur'])) {
            if($_SESSION['idUtilisateur'] == $fkUtilisateur){
                $this->data['sameUser'] = true;
            }
            else {
                $this->data['sameUser'] = false;
            }
        }
        else {
            $this->data['sameUser'] = false;
        }
    }
}


?>