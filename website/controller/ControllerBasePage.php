<?php

    /*Méthode permettant d'ajouter l'header, l'en-tête et le pied de page automatiquement quand appellée.
     Permet de sélectionner le nombre de sous-niveau dans lequel se trouve le fichier concerné pour éviter
     les erreurs de chemin.*/
    function WriteBasePage($numberDirectory)
    {

        $temp = '';

        for ($i=0; $i < $numberDirectory; $i++)
        {
            $temp .= '../';
        }

        include $temp . 'view/head.php';

        echo "<body class = noMarge>";

            include $temp . 'view/header.php';
            include $temp . 'view/footer.php';
            
        echo "</body>";
    }

?>