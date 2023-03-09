<div class = "backgroundBlue littlePadding">
<br><br>
    <div class = "containerLeft">
        <h1 class = "colorWhite littlePadding">
            Les derniers CIFs ajoutés
        </h1>

            <div class = "containerMiddleColumns bigWidth noPadding">
            
                <div class = "containerLeft">

                    <?php
                    foreach($data as $cif) { ?>

                   

                    <?php
                        $eval = $cif['average'];
                        $title = $cif['catTitre'];
                        $name = $cif['cifTitre'];
                        $username = $cif['utiPseudo'];
                        $fullStars = floor($eval);

                        if ($eval - $fullStars >= 0.5) {
                            $halfStars = 1;
                        } else {
                            $halfStars = 0;
                        }

                        $emptyStars = 5 - $fullStars - $halfStars; ?>
                    <h1 class = 'noMarge'><?php echo $title ?></h1>
                    <a href='?link=detailCIF&idCif=<?php echo $cif['idCif'] ?>' class='textSmall2'>
                    <div class = 'backgroundSky borderRound containerLeft'>
                        <div class = 't'>
                            <p class = 'noMarge colorDarkBlue textSmall textLeft'><?php echo $name ?></p>
                        </div>
                        <p class = 'noMarge colorDarkBlue textSmall2'><?php echo $username ?></p>
                    </div>
                    </a>
                    <div class = 'containerMiddle'>
                        <?php 
                        for ($i = 0; $i < $fullStars; $i++) {
                            echo "<p class = 'noMarge'><span class='star'>★</span></p>";
                        }
                        if ($halfStars) {
                            echo "<p class = 'noMarge'><span class='star'>☆</span></p>";
                        }
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

if(isset($_SESSION['showConnection']) && $_SESSION['showConnection'])
{
    $_SESSION['showConnection'] = false;
?>

<div id="popup" class="popup">
        <p>Connexion réussie !</p>
      </div>

<?php
}
?>

<?php

if(isset($_SESSION['addCifAnimation']) && $_SESSION['addCifAnimation'])
{
    $_SESSION['addCifAnimation'] = false;
?>

<div id="popup" class="popup">
        <p>La cif a bien été ajoutée !</p>
      </div>

<?php
}
?>


<script src='website/resources/js/successLogin.js'></script>