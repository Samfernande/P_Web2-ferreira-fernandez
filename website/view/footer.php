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
        <a href="?link=addCIF" class = "textDropDownSmall colorWhite">Ajouter un CIF</a>
        </li>
        <?php if (!isset($_SESSION['isConnected'])){ ?>
        <li class = "colorWhite animationLink textSmall littleSideMarge">
        <a href="?link=login" class = "textDropDownSmall colorWhite">Connexion</a>
        </li>

        <?php } else {?>
        <li class = "colorWhite animationLink textSmall littleSideMarge">
        <a href="?connection=false" class = "textDropDownSmall colorWhite">Deconnexion</a>
        <?php }?>
        
    </ul>

<div class="horizontalLine"></div>

<p class = colorWhite>
ETML, Tout droit réservé - Ferreira João - Fernandez Samuel
</p>


</footer>