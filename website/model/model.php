<?php

// Classe modèle permettant d'intéragir avec la base de données

class Model {

    public $connector;

    public function __construct() {

        $this->connector = new PDO('mysql:host=localhost:6044;dbname=mydb;charset=utf8' , 'root', 'root');
    }

    public function addData($idArray, $catArray){

            //$catArray = array("Livre", "Sport", "Art", "Nature", "Voyage", "Culture", "Photographie", "Gastronomie", "Science", "Humanitaire", "Technologie", "Cinéma", "Histoire", "Musique", "Science-fiction", "Fantasy", "Mode");
            //$idArray = range(1, count($catArray));

            $cat = array_combine($idArray, $catArray);

    
            $req = $this->connector->query('DELETE FROM db_cif.t_categorie');
 
            foreach ($cat as $id => $categorie) {
                $stmt = $this->connector->prepare("INSERT INTO db_cif.t_categorie (idCategorie, catTitre)
                VALUES (:idCategorie, :catTitre)");
                $stmt->bindParam(':idCategorie', $id);
                $stmt->bindParam(':catTitre', $categorie);
                $stmt->execute();
            }
    }
    
}