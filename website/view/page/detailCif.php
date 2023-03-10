<?php

$imgName = 'website/resources/img/imgCategory/' . str_replace("é","e", strtolower($data['cif']['catTitre'])) . '.png';
$colorClassName = str_replace("é","e", strtolower($data['cif']['catTitre']));
$date = $data['cif']['cifDate'];
$date = date('d-m-Y');
?>

<div class = 'backgroundLightBlue littlePadding'>

    <div class='card <?php echo $colorClassName ?>'>

        <div class='containerSpaceBetween backgroundDarkBlue borderRound'>

            <h1 class='colorWhite'><?php echo $data['cif']['cifTitre'] ?></h1>

            <div class='containerHorizontal'>
                <h2 class='colorWhite'><?php echo $data['cif']['catTitre'] ?></h2>
                <p class='colorWhite'><img class='littleImg sideMarge' src= <?php echo $imgName ?>></p>
            </div>

        </div>

        <p class='colorWhite'><?php echo $data['cif']['cifDescription'] ?></p>

        <div class='containerHorizontal'>

        <!--GÉNÉRATION DES ÉTOILES-->
        <?php

            $fullStars = floor($data['cif']['average']);

            if ($data['cif']['average'] - $fullStars >= 0.5) {
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
        <a class='colorWhite' href="?link=userProfile&idUser=<?php echo $data['cif']['idUtilisateur'] ?>"><?php echo $data['cif']['utiPseudo'] ?></a>

            <p class='colorWhite'><?php echo $date ?></p>
        </div>

    </div>

    <?php
        if (!$data['alreadyRated'] && !$data['sameUser']){
    ?>

    <form id="ratingForm" action="" method="POST">

        <div class="ratingContainer">

            <div id='starRating'></div>

        </div>

    </form>
    <?php } elseif ($data['sameUser']) { ?>
        <p>Vous ne pouvez pas évaluer votre propre CIF</p>
    <?php } else {?>
        <p>Vous avez déjà évalué ce CIF</p>
    <?php } ?>

    <script src="https://jsuites.net/v4/jsuites.js"></script>
    <script src="website/resources/js/rating.js"></script>

    <?php if (isset($data['msgNoConnection']) && $data['msgNoConnection'] == true) { ?>
    <div id="popup" class="popup">
        <p>Vous devez être connecté pour évaluer !</p>
    </div>
    <script src='website/resources/js/successLogin.js'></script>
    <?php } ?>
</div>