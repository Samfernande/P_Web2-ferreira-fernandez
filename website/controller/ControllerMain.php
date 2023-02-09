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
            $data .= "<h1 class = 'noMarge'>". $cif['catTitre'] . "</h1>
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
        return $data;
    }
}


?>