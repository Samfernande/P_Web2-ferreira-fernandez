<?php 

include_once "model.php";

class ModelCategory extends Model{

    public function getCategories(){
        $stmt = $this->connector->prepare("SELECT * FROM db_cif.t_categorie");
        $stmt->execute();
        return $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}