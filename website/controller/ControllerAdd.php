<?php 

include_once "Controller.php";
include_once "model/model.php";
include_once "model/ModelUser.php";


class ControllerAdd extends Controller{
    private $model;
    private $data;

    public function __construct() {
        $this->model['category'] = new ModelCategory();
        $this->model['cif'] = new ModelCif();
        $this->view = new View();


        $this->data['category'] = $this->model['category']->getCategories();

        $this->data['cif'] = $this->getForm();

        $this->view->render('addCif.php', $this->data);
    }
    
    private function getForm() {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            
            $category = $_POST['category'] ?? "";
            $title = $_POST['title'] ?? "";
            $description = $_POST['description'] ?? "";

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
            else
            {
                $_SESSION['error'] = true;
            }

            
            
        }

    }

}




?>