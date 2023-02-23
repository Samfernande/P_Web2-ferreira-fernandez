<div class = 'backgroundLightBlue littlePadding'>

<?php foreach ($data as $cif) { 
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

    <div class ='card backgroundDarkBlue'>
        <div class='containerSpaceBetween '>
            <h1 class='colorWhite'><?php echo $name ?></h1>
            <p class='colorWhite'><?php echo $title ?></p>
        </div>

        <div class='containerRightColumns littleSideMarge'>
            <p class='colorWhite'>IMAGE</p>
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
<?php } ?>
    
</div>

