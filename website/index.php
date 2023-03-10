<?php
// démarrage de la session sur toutes les pages
session_start(); 
?>

<!DOCTYPE html>

<html>
    <?php
        include "controller/Controller.php";
  
        // Instancie le controller principal
        $controller = new Controller();
        
        // Depuis le controller principal, récupère le lien sur lequel l'utilisateur a cliqué, puis génère le controlleur correspondant
        $controller->CreateController();
    ?>
<html>

