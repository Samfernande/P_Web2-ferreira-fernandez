<!--
Auteur : João Ferreira & Samuel Fernandez
Date : 10.03.2023
Description : Template contenant le pied de page de toutes les pages
-->

<footer class = "backgroundDarkBlue footer">


<div class="horizontalLine"></div>

    <ul class = "containerMiddle noPadding">

        <li class = "colorWhite animationLink textSmall littleSideMarge">
        <a href="?link=index" class = "textDropDownSmall colorWhite">Accueil</a>
        </li>

        <li class = "colorWhite animationLink textSmall littleSideMarge">
        <a href="?link=allCIF" class = "textDropDownSmall colorWhite">Tous les CIFs</a>
        </li>

        <li class = "colorWhite animationLink textSmall littleSideMarge">

            <?php
            // check si l'utilisateur est connecté  
            if (!isset($_SESSION['isConnected'])) { 

                // renvoie sur la page de login?>
                <a href='?link=login' class = 'textDropDownSmall colorWhite'>Ajouter une CIF</a>

            <?php } else { 

                // renvoie sur la bonne page?>
                <a href='?link=addCif' class = 'textDropDownSmall colorWhite'>Ajouter une CIF</a>

        <?php } ?>

        </li>

        <li class = "colorWhite animationLink textSmall littleSideMarge">

            <?php 
             // check si l'utilisateur est connecté  
            if (!isset($_SESSION['isConnected'])){ 
                
                // affiche "Connexion" pour se connecter ?>
                <a href="?link=login" class = "textDropDownSmall colorWhite">Connexion</a>

            <?php } else {

                // affiche "Connexion" pour se déconnecter ?>
                <a href="?connection=false" class = "textDropDownSmall colorWhite">Deconnexion</a>
                
            <?php }?>

        </li>
        
        
    </ul>

<div class="horizontalLine"></div>

<p class = colorWhite>
ETML, Tout droit réservé - Ferreira João - Fernandez Samuel
</p>

</footer>