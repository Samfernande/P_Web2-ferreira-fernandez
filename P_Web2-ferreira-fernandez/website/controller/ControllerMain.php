<?php 

include_once "Controller.php";
include_once "model/ModelCategorie.php";
include_once "model/ModelCif.php";
include_once "model/ModelUser.php";

class ControllerMain extends Controller{
    private $cif;

    public function __construct() {
        $this->cif = new ModelCif();
        $this->view = new View();
        $this->view->render('main.php', $this->fetchData());
    }

    public function fetchData() {
        $data = "";
        $array = $this->cif->getCif(5);
        foreach($array as $cif) {
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

            $emptyStars = 5 - $fullStars - $halfStars;

            $data .= "<h1 class = 'noMarge'>$title</h1>
            <div class = 'backgroundSky borderRound containerLeft'>
            <div class = 't'>
            <p class = 'noMarge colorDarkBlue textSmall textLeft'>$name</p>
            </div>
            <p class = 'noMarge colorDarkBlue textSmall2'>$username</p>
            </div><div class = 'containerMiddle'>";
        
            for ($i = 0; $i < $fullStars; $i++) {
                $data .= "<p class = 'noMarge'><span class='star'>★</span></p>";
            }
            if ($halfStars) {
                $data .= "<p class = 'noMarge'><span class='star'>☆</span></p>";
            }
            for ($i = 0; $i < $emptyStars; $i++) {
                $data .= "<p class = 'noMarge'><span class='star'>☆</span></p>";
            }
            $data .= "</div>";

        }
        return $data;
    }
}


?>