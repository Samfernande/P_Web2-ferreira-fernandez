<?php 

include_once "model.php";

class ModelUser extends Model{
    
    public function addUser($userPseudo, $userPassword){
        $date = date('y-m-d');

        $stmt = $this->connector->prepare("INSERT INTO db_cif.t_utilisateur (utiPseudo, utiMotDePasse, utiDateEntree) VALUES (:utiPseudo, SHA1(:utiMotDePasse), :utiDateEntree)");

        $stmt->bindParam(':utiPseudo', $userPseudo);
        $stmt->bindParam(':utiMotDePasse', $userPassword);
        $stmt->bindParam(':utiDateEntree', $date);
        $stmt->execute();
    }

    public function getUser(){
        $stmt = $this->connector->prepare("SELECT * FROM db_cif.t_utilisateur");
        $stmt->execute();
        return $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}