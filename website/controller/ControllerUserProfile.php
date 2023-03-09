<?php 

include_once "Controller.php";
include_once "model/ModelUser.php";
include_once "model/ModelEvaluation.php";
include_once "model/ModelCif.php";

class ControllerUserProfile extends Controller
{
    private $model;
    private $data;
    private $idUser;


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

    function getUser()
    {
        return $this->model['modelUser']->getUserById($this->idUser);
    }

    function getNbEval()
    {
        return $this->model['modelEvaluation']->getEvaluationByUserId($this->idUser);
    }

    function getNbCifs()
    {
        return $this->model['modelCif']->getCifsByUserId($this->idUser);
    }

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
