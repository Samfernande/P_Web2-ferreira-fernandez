<?php


 /*Classe view qui va permettre d'afficher et de construire les pages*/
class View {
    protected $data;

    /*Constructeur de la classe View, permet de récupérer les données à afficher*/
    public function __construct($data = []) {
        $this->data = $data;
    }

    /*Méthode permettant d'ajouter l'header, l'en-tête et le pied de page automatiquement quand appelée, permet de construire la page demandée*/
     function render($view_name)
     { 
         include 'view/head.php';
 
         echo "<body class = 'noMarge'>";
 
             include 'view/header.php';
             include 'view/page/' . $view_name;
             include 'view/footer.php';
             
         echo "</body>";
     }

     /*Méthode permettant de créer la liste de CIF suivant les données reçues par le modèle*/
     function WriteCIF($number)
        {
            $data = "";

        for ($i=0; $i < $number; $i++)
        {
            $data .= "<h1 class = 'noMarge'>Resto</h1>
    
            <div class = 'backgroundSky borderRound containerLeft'>

                <div class = 't'>
                    <p class = 'noMarge colorDarkBlue textSmall textLeft'>AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA</p>
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

        return $data;
    }
}
