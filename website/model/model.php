<?php

// Classe modèle permettant d'intéragir avec la base de données

class Model {

    public $connector;

    public function __construct() {

        $this->connector = new PDO('mysql:host=localhost:6044;dbname=mydb;charset=utf8' , 'root', 'root');
    }

    


    
}