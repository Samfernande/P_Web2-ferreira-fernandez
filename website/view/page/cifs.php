<!--
TITRE : P_Web2-CIFs
AUTEURS : Ferreira Jõao & Fernandez Samuel
DATE : 23.02.2023
LIEU : Lausanne
DESCRIPTION : View qui contient la totalité des CIFs, ainsi qu'un système de tri de ces derniers par rapport à leur catégorie,
              évaluations, etc...
-->


<div class='backgroundLightBlue littlePadding'>

    <h1 class='colorDarkBlue title'>Tous les CIFs</h1>

    <div class='horizontalLine'>
    </div>

    <h1 class='colorDarkBlue alignLeft'>Trier les CIFs</h1>


    <form>
        <div class='containerColumnMiddle'>
            <div class='containerSpaceEvenly'>
                <div>
                    <label class='textSmall'>Trier par catégorie :</label>

                    <select class='selectCif' name="liste1">
                        <option value="option1">Option 1</option>
                        <option value="option2">Option 2</option>
                        <option value="option3">Option 3</option>
                    </select>
                </div>

                <div>
                    <label class='textSmall'>Trier par évaluations :</label>

                    <select class='selectCif' name="liste2">
                        <option value="option1">Option 1</option>
                        <option value="option2">Option 2</option>
                        <option value="option3">Option 3</option>
                    </select>
                </div>
            </div>
            
            <button type="submit" class='buttonCif'>Rechercher</button>

</div>
    </form>

    <div class='horizontalLine'>
    </div>

    <h1 class='colorDarkBlue alignLeft'>CIFs les plus récents</h1>






    <!--=========================RÉCUPÉRATION DES CIFs=========================-->


    <div class = 'littlePadding'>

        <?php

        //PHP qui permet d'afficher tous les CIFs contenus dans la base de données du site web.

            // Récupère les variables des CIFs et les ajoute
            foreach ($data as $cif) { 
                $eval = $cif['average'];
                $title = $cif['catTitre'];
                $name = $cif['cifTitre'];
                $username = $cif['utiPseudo'];
                $fullStars = floor($eval);

                $imgName = 'website/resources/img/imgCategory/' . strtr(strtolower($title),"é", "e" ) . '.png';
                $colorClassName = strtr(strtolower($title),"é", "e" );

                if ($eval - $fullStars >= 0.5) {
                    $halfStars = 1;
                } else {
                    $halfStars = 0;
                }

                $emptyStars = 5 - $fullStars - $halfStars;


        ?>

            <!--=========================CONTENU D'UNE CARTE CIF=========================-->

            <div class ='card <?php echo $colorClassName ?>'>
                <div class='containerSpaceBetween '>
                    <h1 class='colorWhite'><?php echo $name ?></h1>
                    <p class='colorWhite'><?php echo $title ?></p>
                </div>

                <div class='containerRightColumns littleSideMarge'>
                    <p class='colorWhite'><img class='littleImg' src= <?php echo $imgName ?>></p>
                </div>
                
                <div class='containerSpaceBetween '>
                    <p class='colorWhite textSmall'><?php echo $username ?></p>
                    <div class='containerMiddle'>
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
                </div>
            </div>

        <!--FIN DU FOREACH-->
        <?php } ?>
            
        </div>

</div>

