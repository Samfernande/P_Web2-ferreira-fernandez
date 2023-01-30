<!DOCTYPE html>

<html>

    <?php 
    include_once "controller/ControllerMain.php";
    include_once "model/ModelUser.php";

        $controllerMain = new ControllerMain();
        $modelUser = new ModelUser();

        for ($i=0; $i < 6 ; $i++){

            $modelUser->addUser("Michel" . $i, "Michel" . $i);
            
        }

        
        
    ?>




<html>

