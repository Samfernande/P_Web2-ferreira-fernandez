<!--
Auteur : João Ferreira & Samuel Fernandez
Date : 10.03.2023
Description : Page de détails d'un utilisateur utilisateur
-->

<div class='backgroundLightBlue littlePadding'>

    <div class='containerSpaceBetween'>
        <h1 class='title colorDarkBlue'><?php echo $data['user']['utiPseudo'] // nom de l'utilisateur ?></h1>
        <p class='colorDarkBlue'>Inscrit le : <?php echo $data['user']['utiDateEntree'] // date d'entrée de l'utilisateur ?></p>
    </div>

    <div class = 'horizontalLine'></div>

    
    <div class='containerLeft'>

    <h1 class='title2 colorDarkBlue'>Statistiques</h1>
    
    <p class='colorDarkBlue marginLeft'>Nombre de CIFs : <?php echo count($data['cif']) ?></p>
    <p class='colorDarkBlue marginLeft'>Nombre d'évaluations : <?php echo count($data['evaluation'])?></p>
    <p class='colorDarkBlue marginLeft'>Moyenne de tous les CIFs : <?php echo $data['average']?></p>


    </div>


    <div class = 'horizontalLine'></div>

    


    <button id="showDiv" onclick="showCifs()" class='buttonShowCif'>Afficher les CIFs de l'utilisateur</button>

    <div class = "containerMiddleColumns">

<?php 
// parcourt le tableau de cifs de l'utilisateur
foreach($data['cif'] as $cif) { ?>

    <?php
    // variables d'un cif et l'utilisateur
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
    
    <div class='allCifs' style="display: none;">
        <h1 class = 'noMarge'><?php echo $title // nom de la catégorie du CIF ?></h1>
        <a href='?link=detailCIF&idCif=<?php echo $cif['idCif'] // renvoie sur la page de détail du CIF spécifique en fonction du ID ?>' class='textSmall2'>
        <div class = 'backgroundSky borderRound containerLeft'>
            <div class = 't'>
                <p class = 'noMarge colorDarkBlue textSmall textLeft'><?php echo $name // nom d'un CIF ?></p>
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
    </div>

<?php } ?>

</div>

</div>



<script src='website/resources/js/showHideElements.js'></script>

<!-- FAIRE SYSTEME POUR CACHER LES CIFs -->
