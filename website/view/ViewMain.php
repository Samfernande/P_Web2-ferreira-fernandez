<?php

class ViewMain extends View {

    public function printLatestCifs() {
        foreach ($this->data as $cif) {

            echo 
            "<h1 class = 'noMarge'>Resto</h1>

            <div class = 'backgroundSky borderRound containerLeft'>
                <div class = 't'>
                    <p class = 'noMarge colorDarkBlue textSmall textLeft'>asdsasd</p>
                </div>

                <p class = 'noMarge colorDarkBlue textSmall2'>De Paul</p>
            </div>

            <div class = 'containerMiddle'>
            
        <p class = 'noMarge'>✩</p>
        <p class = 'noMarge'>✩</p>
        <p class = 'noMarge'>✩</p>
        <p class = 'noMarge'>✩</p>
        <p class = 'noMarge'>✩</p>
        </div>";
            
        }
    }
}


?>