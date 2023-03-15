<?php 
/**
 * Auteur : João Ferreira & Samuel Fernandez
 * Date : 10.03.2023
 * Description : Controller permettant l'ajout d'un CIF
 */

include_once "Controller.php";
include_once "model/model.php";
include_once "model/ModelUser.php";

// hérite de la classe Controller
class ControllerAdd extends Controller{
    private $model;
    private $data;

     /**
     * Constructeur de la classe ControllerAdd, donne des variables de model à la view, génére la page spécifique
    */
    public function __construct() {
        $this->model['category'] = new ModelCategory();
        $this->model['cif'] = new ModelCif();
        $this->view = new View();


        $this->data['category'] = $this->model['category']->getCategories();

        $this->data['cif'] = $this->getForm();

        $this->view->render('addCif.php', $this->data);
    }
    
     /**
     * Récupération du formulaire rempli par l'utilisateur pour ajouter un CIF
    */
    private function getForm() {

        // Détecte si une requête POST a bien eu lieu

        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            
            $category = $_POST['category'] ?? "";
            $title = $_POST['title'] ?? "";
            $description = $_POST['description'] ?? "";

            // Si toutes les données sont valides, ajoute les CIFs dans la base de données

            if(!empty($category) && !empty($title) && !empty($description) && strlen($title) <= 50 && strlen($description) <= 1000 && isset($_SESSION['idUtilisateur']))
            {
                $user = $_SESSION['idUtilisateur'];

                $allCategories = $this->model['category']->getCategories();

                date_default_timezone_set('Europe/Zurich');
                $date = date("Y-m-d H:i:s");

                foreach ($allCategories as $cat) {
                    if ($category == $cat['catTitre']) {
                        $idCategory = $cat['idCategorie'];
                    }
                }


                $data = array(
                    'cifTitre' => $title,
                    'cifDescription' => $description,
                    'cifDate' => $date,
                    'fkUtilisateur' => $user,
                    'fkCategorie' => $idCategory
                ); 

                $this->model['cif']->addCif($data);
                $_SESSION['addCifAnimation'] = true;
                header('Location: ?link=index');
                die();
            }
            // Sinon, renvoie une erreur
            else
            {
                $_SESSION['error'] = true;
            }

            
            
        }

    }

}


?>