<?php 

include_once "model.php";

class ModelCif extends Model{
    public function addCif($cifTitle, $cifDescription, $user, $categorie){
        $date = date('y-m-d');

        $stmt = $this->connector->prepare("INSERT INTO db_cif.t_cif (cifTitre, cifDescription, cifDate, fkUtilisateur, fkCategorie) VALUES (:cifTitre, :cifDescription, :cifDate, :fkUtilisateur, :fkCategorie)");

        $stmt->bindParam(':cifTitre', $cifTitle);
        $stmt->bindParam(':cifDescription', $cifDescription);
        $stmt->bindParam(':cifDate', $date);
        $stmt->bindParam(':fkUtilisateur', $user);
        $stmt->bindParam(':fkCategorie', $categorie);
        $stmt->execute();
    } 
}