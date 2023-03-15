<?php 
/**
 * Auteur : João Ferreira & Samuel Fernandez
 * Date : 10.03.2023
 * Description : Classe ModelCategory contenant des méthodes de récupération de données de catégories
 */

include_once "model.php";

// hérite de la classe Model
class ModelCategory extends Model{

     /**
     * Récupération de tous les catégories
     */
    public function getCategories(){
        // requête SQL
        $query = "SELECT * FROM db_cif.t_categorie";

        // préparation de la requête
        $stmt = $this->connector->prepare($query);

        // execution de la requête
        $stmt->execute();

        // traitement des données en tableau associatif
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>