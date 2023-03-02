<?php 

include_once "Controller.php";
include_once "model/ModelUser.php";
include_once "model/ModelEvaluation.php";


// Contrôleur de la page de détail des CIFs (C'est ici que l'on pourra ajouter une évaluation aux CIFs)
class ControllerDetailCif extends Controller
{
    private $model;
    private $data;

    public function __construct() {
        $this->view = new View();
        $this->model['modelCif'] = new ModelCif();
        $this->model['modelEvaluation'] = new ModelEvaluation();
        $this->data['cif'] = $this->getCif();
        $this->data['evaluation'] = $this->model['modelEvaluation']->getEvaluation();
        $this->getEval();
        $this->view->render('detailCif.php', $this->data);
    }


    function getCif()
    {
        $idCif = $_GET['idCif'];

        return $this->model['modelCif']->getCifByID($idCif);
    }

    function getEval()
    {
        if (isset($_POST['ratingInput'])) 
        {
            $rating = $_POST['ratingInput'];

            $this->model['modelEvaluation']->addEvaluation($_SESSION['idUtilisateur'], $_GET['idCif'], $rating);

            header("Location: #");
            exit();
        }
    }

    

}


?>