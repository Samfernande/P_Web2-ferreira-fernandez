<?php 
/**
 * Auteur : João Ferreira & Samuel Fernandez
 * Date : 10.03.2023
 * Description : Classe ModelEvaluation contenant des méthodes de récupération et insertion d'évaluations
 */

include_once "model.php";

// hérite de la classe model
class ModelEvaluation extends Model{

     /**
     * Récupération de toutes les évaluations
     */
    public function getEvaluation() {
        // requête SQL
        $query = "SELECT * FROM db_cif.t_evaluation";

        // préparation de la requête
        $stmt = $this->connector->prepare($query);
        
        // execution de la requête
        $stmt->execute();

        // traitement des données en tableau associatif
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Récupération des évaluations de l'utilisateur
     */
    public function getEvaluationByUserId($idUser) {
        // requête SQL
        $query = "SELECT * FROM db_cif.t_evaluation WHERE fkUtilisateur = $idUser";

        // préparation de la requête
        $stmt = $this->connector->prepare($query);

        // execution de la requête
        $stmt->execute();

        // traitement des données en tableau associatif
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Ajouter une évaluation
     */
    public function addEvaluation($user, $cif, $evaluation) {
        // requête SQL
        $query = "INSERT INTO db_cif.t_evaluation (db_cif.t_evaluation.evaNote, db_cif.t_evaluation.fkUtilisateur, db_cif.t_evaluation.fkCif) VALUES ($evaluation, $user, $cif)";
        
        // préparation de la requête
        $req = $this->connector->prepare($query);
        
        // execution de la requête
        $req->execute();
    }

}
?>