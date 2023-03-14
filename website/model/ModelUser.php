<?php 
/**
 * Auteur : João Ferreira & Samuel Fernandez
 * Date : 10.03.2023
 * Description : Classe ModelUser contenant des méthodes de récupération de données d'utilisateurs
 */

include_once "model.php";

// hérite de la classe Model
class ModelUser extends Model
{
    
     /**
     * Ajout d'un utilisateur sur la base de données
     */
    public function addUser($userPseudo, $userPassword){
        // date actuelle
        $date = date('y-m-d');

        // requête SQL
        $query = "INSERT INTO db_cif.t_utilisateur (utiPseudo, utiMotDePasse, utiDateEntree) VALUES (:utiPseudo, SHA1(:utiMotDePasse), :utiDateEntree)";
        
        // préparation de la requête
        $stmt = $this->connector->prepare($query);

        // liaison des paramètres
        $stmt->bindParam(':utiPseudo', $userPseudo);
        $stmt->bindParam(':utiMotDePasse', $userPassword);
        $stmt->bindParam(':utiDateEntree', $date);

        // execution de la requête
        $stmt->execute();
    }

    /**
     * Récupération de tous les utilisateurs
     */
    public function getUser(){
        // requête SQL
        $query = "SELECT * FROM db_cif.t_utilisateur";

        // préparation de la requête
        $stmt = $this->connector->prepare($query);

        // execution de la requête
        $stmt->execute();

        // traitement des données en tableau associatif
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Récupération d'un utilisateur en fonction de l'ID
     */
    public function getUserById($idUser) {
        // requête SQL
        $query = "SELECT * FROM db_cif.t_utilisateur WHERE idUtilisateur = $idUser";
        
        // préparation de la requête
        $stmt = $this->connector->prepare($query);
        
        // execution de la requête
        $stmt->execute();
        
        // traitement des données en tableau associatif
        return $stmt->fetchAll(PDO::FETCH_ASSOC)[0];
    }
}
?>