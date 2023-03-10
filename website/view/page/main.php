<!--
Auteur : João Ferreira & Samuel Fernandez
Date : 10.03.2023
Description : Page d'accueil contenant les 5 derniers CIFs ajoutés
-->

<div class = "backgroundBlue littlePadding">
<br><br>
    <div class = "containerLeft">
        <h1 class = "colorWhite littlePadding">
            Les derniers CIFs ajoutés
        </h1>

            <div class = "containerMiddleColumns bigWidth noPadding">
            
                <div class = "containerLeft">

                    <?php
                    // parcourt le tableau des 5 derniers cifs
                    foreach($data as $cif) {
                        // variables du CIF
                        $eval = $cif['average'];
                        $title = $cif['catTitre'];
                        $name = $cif['cifTitre'];
                        $username = $cif['utiPseudo'];
                        $fullStars = floor($eval);

                        // arrondi les évaluations des étoiles remplies
                        if ($eval - $fullStars >= 0.5) {
                            $halfStars = 1;
                        } else {
                            $halfStars = 0;
                        }

                        // nombre d'étoiles vides
                        $emptyStars = 5 - $fullStars - $halfStars; ?>

                    <h1 class = 'noMarge'><?php echo $title // nom de la catégorie ?></h1>
                    <a href='?link=detailCIF&idCif=<?php echo $cif['idCif'] // renvoie sur la page de détail du CIF spécifique en fonction du ID ?>' class='textSmall2'>
                    <div class = 'backgroundSky borderRound containerLeft'>
                        <div class = 't'>
                            <p class = 'noMarge colorDarkBlue textSmall textLeft'><?php echo $name // nom du CIF ?></p>
                        </div>
                        <p class = 'noMarge colorDarkBlue textSmall2'><?php echo $username // nom du créateur du CIF ?></p>
                    </div>
                    </a>
                    <div class = 'containerMiddle'>
                        <?php 
                        // affiche des étoile remplies en fonction de l'évaluation
                        for ($i = 0; $i < $fullStars; $i++) {
                            echo "<p class = 'noMarge'><span class='star'>★</span></p>";
                        }
                        if ($halfStars) {
                            echo "<p class = 'noMarge'><span class='star'>☆</span></p>";
                        }

                        // affiche des étoiles vides en fonction de la différence du total et l'évaluation
                        for ($i = 0; $i < $emptyStars; $i++) {
                            echo"<p class = 'noMarge'><span class='star'>☆</span></p>";
                        }
                        ?>
                    </div>
                    <?php } ?>


                </div>
            </div>

    </div>

</div>

<div class = 'backgroundLightBlue littlePadding'>

    <h1 class = "colorDarkBlue title">Qu'est-ce que CIF.com ?</h1>
    <div class = 'horizontalLine'></div>
    <p class = "colorDarkBlue noMarge">CIF.com est un site web/application qui permet aux utilisateurs de partager et découvrir les coups de coeur dans diverses catégories telles que les livres, les albums, les jeux vidéo, les restaurants, les activités, etc. CIF signifie "Coup de Coeur" en français.</p>
    <br>
    <p class = "colorDarkBlue noMarge">Notre site vous permet de visualiser la liste complète des CIF stockées dans notre base de données, ainsi que les évaluations associées. Vous pouvez également partager vos propres coups de coeur en remplissant simplement un formulaire sur notre page "Ajouter une CIF".</p>
    <br>
    <p class = "colorDarkBlue noMarge">Notre objectif est de permettre aux utilisateurs de découvrir de nouveaux coups de coeur dans leurs centres d'intérêt et de partager leurs propres recommandations avec la communauté. Rejoignez-nous dès maintenant pour découvrir de nouveaux coups de coeur et partager les vôtres !</p>
    <br>
    <div class = 'horizontalLine'></div>
    

</div>

<?php
// si l'utilisateur se connecte, affiche message de connexion
if(isset($_SESSION['showConnection']) && $_SESSION['showConnection'])
{
    $_SESSION['showConnection'] = false;
?>

<div id="popup" class="popup">
        <p>Connexion réussie !</p>
      </div>

<?php } ?>

<?php
// si un CIF a été ajoutée, affiche message de confirmation 
if(isset($_SESSION['addCifAnimation']) && $_SESSION['addCifAnimation'])
{
    $_SESSION['addCifAnimation'] = false;
?>

<div id="popup" class="popup">
        <p>La cif a bien été ajoutée !</p>
      </div>

<?php } ?>


<script src='website/resources/js/successLogin.js'></script>