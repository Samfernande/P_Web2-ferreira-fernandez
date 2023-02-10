<?php


 /*Classe view qui va permettre d'afficher et de construire les pages*/
class View {

    /*Constructeur de la classe View, permet de récupérer les données à afficher*/
    public function __construct() {

    }

    /*Méthode permettant d'ajouter l'header, l'en-tête et le pied de page automatiquement quand appelée, permet de construire la page demandée*/
     function render($view_name, $data)
     { 
         include 'view/head.php';
 
         echo "<body class = 'noMarge'>";
 
             include 'view/header.php';
             include 'view/page/' . $view_name;
             include 'view/footer.php';
             
         echo "</body>";
     }
     
}
