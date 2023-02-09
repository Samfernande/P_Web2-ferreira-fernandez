<div class = "backgroundBlue littlePadding">

    <div class = "containerLeft">

        <h1 class = "colorWhite littlePadding">
            Les derniers CIFs ajoutés
        </h1>

            <div class = "containerMiddleColumns bigWidth noPadding">

                <div class = "containerLeft">

                    <?php 
                    echo $data[0]['cifTitre'];
                    $array = $this->data;
                    foreach($array as $cif) {
                        echo "<h1 class = 'noMarge'>". $cif['catTitre'] . "</h1>
                        <div class = 'backgroundSky borderRound containerLeft'>
                        <div class = 't'>
                        <p class = 'noMarge colorDarkBlue textSmall textLeft'>". $cif['cifTitre'] . "</p>
                        </div>
                        <p class = 'noMarge colorDarkBlue textSmall2'>". $cif['utiPseudo'] . "</p>
                        </div>
                        <div class = 'containerMiddle'>
                        <p class = 'noMarge'>✩</p>
                        <p class = 'noMarge'>✩</p>
                        <p class = 'noMarge'>✩</p>
                        <p class = 'noMarge'>✩</p>
                        <p class = 'noMarge'>✩</p>
                        </div>";
                    }
                    
                    ?>

                </div>
    
            </div>

    </div>

</div>

<div class = 'backgroundLightBlue littlePadding'>

    <h1 class = "colorDarkBlue title">Qu'est-ce que CIF.com ?</h1>
    <div class = 'horizontalLine'></div>
    <p class = "colorDarkBlue noMarge">HANANANAN HAHAHAH AHAHAHAHHAHANAHNAHAN AHN</p>
    <p class = "colorDarkBlue noMarge">HANANANAN HAHAHAH AHAHAHAHHAHANAHNAHAN AHN</p>
    <p class = "colorDarkBlue noMarge">HANANANAN HAHAHAH AHAHAHAHHAHANAHNAHAN AHN</p>
    <p class = "colorDarkBlue noMarge">HANANANAN HAHAHAH AHAHAHAHHAHANAHNAHAN AHN</p>
    <div class = 'horizontalLine'></div>
    

</div>

