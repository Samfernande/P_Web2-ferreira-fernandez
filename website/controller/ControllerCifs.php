<?php 
/**
 * Auteur : João Ferreira & Samuel Fernandez
 * Date : 10.03.2023
 * Description : Controller permettant de afficher/récupérer tous les CIFs
 */

include_once "Controller.php";
include_once "model/ModelCif.php";
include_once "model/ModelUser.php";
include_once "model/ModelCategory.php";

// hérite de la classe Controller
class ControllerCifs extends Controller{
    private $model;
    private $data;

    /**
     * Constructeur de la classe ControllerCifs, donne des variables de model à la view, génére la page spécifique
    */
    public function __construct() {
        $this->model['cif'] = new ModelCif();
        $this->model['category'] = new ModelCategory();

        $this->view = new View();

        $this->data['cif'] = $this->generateCIFs();
        $this->data['category'] = $this->model['category']->getCategories();
        
        $this->view->render('cifs.php', $this->data);
    }   

    /**
     * Génére tous les CIFs à l'aide de la requête réalisé dans ModelCif, et retourne des variables pour donner à la view
    */
    function generateCIFs()
    {
        $category = $_POST['selectCif'] ?? '';
        $evaluation = $_POST['selectEvaluation'] ?? '';
        $search = $_POST['searchBar'] ?? '';

        if(!empty($category) || !empty($evaluation) || !empty($search))
        {
            $this->data['search'] = true;
            return $this->model['cif']->getCifSorted($category, $evaluation, $search);
        }
        else
        {
            $this->data['search'] = false;
            return $this->model['cif']->getAllCifs();
        }
    }

    
}

?>