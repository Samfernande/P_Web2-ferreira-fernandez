<?php
/**
 * Auteur : João Ferreira & Samuel Fernandez
 * Date : 10.03.2023
 * Description : Classe modèle permettant d'intéragir avec la base de données
 */

class Model {
    // variable de connexion
    public $connector;

     /**
     * Constructeur de la classe Model, connexion à la base de données
     */
    public function __construct() {

        $this->connector = new PDO('mysql:host=localhost:6044;dbname=mydb;charset=utf8' , 'root', 'root');
    }
    
}
?>