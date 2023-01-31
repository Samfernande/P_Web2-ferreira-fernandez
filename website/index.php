<!DOCTYPE html>

<html>

    <?php 
    include_once "controller/ControllerMain.php";
    include_once "model/ModelCif.php";

        $controllerMain = new ControllerMain();
        $modelCif = new ModelCif();
        
        $cif = $modelCif->getCif();

        for($i = 0; $i <= 5; $i++){
            if($i == $cif[$i]['idCif']){
                echo $cif[$i]['idCif'];
            }
        }
        
    ?>




<html>

