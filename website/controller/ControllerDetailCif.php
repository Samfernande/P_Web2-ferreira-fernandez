<?php 

include_once "Controller.php";
include_once "model/ModelUser.php";


// Contrôleur de la page de détail des CIFs (C'est ici que l'on pourra ajouter une évaluation aux CIFs)
class ControllerDetailCif extends Controller
{
    private $model;
    private $data;

    public function __construct() {
        $this->view = new View();
        $this->model['modelCif'] = new ModelCif();
        $this->data = $this->getCif();
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
        if (isset($_POST['rating'])) {
            $rating = $_POST['rating'];
            header('Location: /website?link=detailCIF&idCif=1');
            var_dump($rating);
        }


    }

    

}


?>