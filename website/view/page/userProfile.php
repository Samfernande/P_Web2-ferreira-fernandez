<p><?php echo $data['user']['utiPseudo']?></p>
<p><?php echo $data['user']['utiDateEntree']?></p>

<?php
                    foreach($data['cif'] as $cif) { ?>

                   

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