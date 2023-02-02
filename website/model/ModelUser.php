<?php 

include_once "model.php";

class ModelUser extends Model{
    
    public function addUser($userPseudo, $userPassword){
        $date = date('y-m-d');

        $stmt = $this->connector->prepare("INSERT INTO db_cif.t_utilisateur (utiPseudo, utiMotDePasse, utiDateEntree) VALUES (:utiPseudo, :utiMotDePasse, :utiDateEntree)");

        $stmt->bindParam(':utiPseudo', $userPseudo);
        $stmt->bindParam(':utiMotDePasse', $userPassword);
        $stmt->bindParam(':utiDateEntree', $date);
        $stmt->execute();
    } 
}