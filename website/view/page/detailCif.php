<?php

$imgName = 'website/resources/img/imgCategory/' . strtr(strtolower($data['catTitre']),"é", "e" ) . '.png';
$colorClassName = strtr(strtolower($data['catTitre']),"é", "e" );

?>

<div class = 'backgroundLightBlue littlePadding'>

    <div class='card <?php echo $colorClassName ?>'>

        <div class='containerSpaceBetween backgroundDarkBlue borderRound'>

            <h1 class='colorWhite'><?php echo $data['cifTitre'] ?></h1>

            <div class='containerHorizontal'>
                <h2 class='colorWhite'><?php echo $data['catTitre'] ?></h2>
                <p class='colorWhite'><img class='littleImg sideMarge' src= <?php echo $imgName ?>></p>
            </div>

        </div>

        <p class='colorWhite'><?php echo $data['cifDescription'] ?></p>

        <div class='containerHorizontal'>

        <!--GÉNÉRATION DES ÉTOILES-->
        <?php

            $fullStars = floor($data['average']);

            if ($data['average'] - $fullStars >= 0.5) {
                $halfStars = 1;
            } else {
                $halfStars = 0;
            }

            $emptyStars = 5 - $fullStars - $halfStars;
                                        
            for ($i = 0; $i < $fullStars; $i++) {
                echo "<p class = 'noMarge'><span class='star title2'>★</span></p>";

            }

            if ($halfStars) {
                echo "<p class = 'noMarge'><span class='star title2'>☆</span></p>";
            }
            for ($i = 0; $i < $emptyStars; $i++) {
                echo"<p class = 'noMarge'><span class='star title2'>☆</span></p>";

            }            
        ?>
        </div>

        <div class='containerSpaceBetween'>
        <p class='colorWhite'><?php echo $data['utiPseudo'] ?></p>

            <p class='colorWhite'><?php echo $data['cifDate'] ?></p>
        </div>

    </div>

    

    


    <script src="/website/resources/js/rating.js"></script>

</div>