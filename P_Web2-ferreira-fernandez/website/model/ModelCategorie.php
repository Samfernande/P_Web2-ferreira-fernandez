<?php 

include_once "model.php";

class ModelCategorie extends Model{

    public function addData(){

        $catArray = array("Livre", "Sport", "Art", "Nature", "Voyage", "Culture", "Photographie", "Gastronomie", "Science", "Humanitaire", "Technologie", "Cinéma", "Histoire", "Musique", "Science-fiction", "Fantasy", "Mode");
        $idArray = range(1, count($catArray));
        $cat = array_combine($idArray, $catArray);

        $cat = array_combine($idArray, $catArray);

        foreach ($cat as $id => $categorie) {
            $checkStmt = $this->connector->prepare("SELECT * FROM db_cif.t_categorie WHERE idCategorie = :idCategorie");
            $checkStmt->bindParam(':idCategorie', $id);
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


?>