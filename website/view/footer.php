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

            <?php  if (!isset($_SESSION['isConnected'])) { ?>
                
                <a href='?link=login' class = 'textDropDownSmall colorWhite'>Ajouter une CIF</a>

            <?php } else { ?>

                <a href='?link=addCif' class = 'textDropDownSmall colorWhite'>Ajouter une CIF</a>

        <?php } ?>

        </li>

        <li class = "colorWhite animationLink textSmall littleSideMarge">

            <?php if (!isset($_SESSION['isConnected'])){ ?>

                <a href="?link=login" class = "textDropDownSmall colorWhite">Connexion</a>

            <?php } else {?>

                <a href="?connection=false" class = "textDropDownSmall colorWhite">Deconnexion</a>
                
            <?php }?>

        </li>
        
        
    </ul>

<div class="horizontalLine"></div>

<p class = colorWhite>
ETML, Tout droit réservé - Ferreira João - Fernandez Samuel
</p>


</footer>