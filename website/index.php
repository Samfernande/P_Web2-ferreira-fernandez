<!DOCTYPE html>

<html>

    <?php 
    include_once "controller/ControllerMain.php";
    include_once "model/ModelCif.php";

        $controllerMain = new ControllerMain();
        $modelCif = new ModelCif();

        for ($i=0; $i < 6 ; $i++){

            $modelCif->addCif("J'adore les zizis", "H", $i, $i);
            
        }

        
        
    ?>




<html>

