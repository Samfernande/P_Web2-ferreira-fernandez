<?php

// Classe modèle permettant d'intéragir avec la base de données

class Model {

    public $connector;

    public function __construct() {

        $this->connector = new PDO('mysql:host=localhost:6044;dbname=mydb;charset=utf8' , 'root', 'root');
    }

    public function addData($catArray){

            $catArray = array("Livre", "Sport", "Art", "Nature", "Voyage", "Culture", "Photographie", "Gastronomie", "Science", "Humanitaire", "Technologie", "Cinéma", "Histoire", "Musique", "Science-fiction", "Fantasy", "Mode");
            $idArray = range(1, count($catArray));
            $cat = array_combine($idArray, $catArray);
    
            $cat = array_combine($idArray, $catArray);

            foreach ($cat as $id => $categorie) {
                $checkStmt = $this->connector->prepare("SELECT * FROM db_cif.t_categorie WHERE catTitre = :catTitre");
                $checkStmt->bindParam(':catTitre', $categorie);
                $checkStmt->execute();
              
                if ($checkStmt->rowCount() == 0) {
                  $insertStmt = $this->connector->prepare("INSERT INTO db_cif.t_categorie (idCategorie, catTitre) VALUES (:idCategorie, :catTitre)");
                  $insertStmt->bindParam(':idCategorie', $id);
                  $insertStmt->bindParam(':catTitre', $categorie);
                  $insertStmt->execute();
                }
            }
    }
    
}