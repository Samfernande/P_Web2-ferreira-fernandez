<!DOCTYPE html>

<html>

    <?php 
        include_once 'view/view.php';
        include_once 'model/ModelCategorie.php';

        $model = new ModelCategorie();
        $view = new View();

        $view->render('main.php');

        $model->addData();
        
    ?>




<html>

