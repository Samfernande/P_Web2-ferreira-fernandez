<?php 

include_once "Controller.php";
include_once "model/ModelCif.php";
include_once "model/ModelUser.php";
include_once "model/ModelCategory.php";


class ControllerCifs extends Controller{
    private $model;
    private $data;

    public function __construct() {
        $this->model['cif'] = new ModelCif();
        $this->model['category'] = new ModelCategory();

        $this->view = new View();

        $this->data['cif'] = $this->generateCIFs();
        $this->data['category'] = $this->model['category']->getCategories();
        
        $this->view->render('cifs.php', $this->data);
    }

    function generateCIFs()
    {
        $category = $_POST['selectCif'] ?? '';
        $evaluation = $_POST['selectEvaluation'] ?? '';

        if(!empty($category) || !empty($evaluation))
        {
            $this->data['search'] = true;
            return $this->model['cif']->getCifSorted($category, $evaluation);
        }
        else
        {
            $this->data['search'] = false;
            return $this->model['cif']->getAllCifs();
        }
    }

    
}

?>