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

    public function getLimitCif($number) {
        $stmt = $this->connector->prepare(
        "SELECT t_cif.idCif, t_cif.cifTitre, t_utilisateur.utiPseudo, COALESCE(ROUND(CEIL(AVG(t_evaluation.evaNote) * 2) / 2, 1), 0) AS average, catTitre, cifDate
        FROM db_cif.t_cif 
        LEFT JOIN db_cif.t_utilisateur ON t_cif.fkUtilisateur = t_utilisateur.idUtilisateur 
        LEFT JOIN db_cif.t_evaluation ON t_cif.idCif = t_evaluation.fkCif 
        INNER JOIN db_cif.t_categorie ON t_cif.fkCategorie = t_categorie.idCategorie 
        GROUP BY t_cif.idCif 
        ORDER BY cifDate DESC 
        LIMIT $number;");

        $stmt->execute();
        return $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAllCifs() {
        $stmt = $this->connector->prepare(
        "SELECT t_cif.idCif, t_cif.cifTitre, t_utilisateur.utiPseudo, COALESCE(ROUND(CEIL(AVG(t_evaluation.evaNote) * 2) / 2, 1), 0) AS average, catTitre, cifDate
        FROM db_cif.t_cif 
        LEFT JOIN db_cif.t_utilisateur ON t_cif.fkUtilisateur = t_utilisateur.idUtilisateur 
        LEFT JOIN db_cif.t_evaluation ON t_cif.idCif = t_evaluation.fkCif 
        INNER JOIN db_cif.t_categorie ON t_cif.fkCategorie = t_categorie.idCategorie 
        GROUP BY t_cif.idCif 
        ORDER BY cifDate DESC;");
        
        $stmt->execute();
        return $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}