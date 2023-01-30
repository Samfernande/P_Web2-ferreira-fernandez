<!DOCTYPE html>

<html>

    <?php 
        include_once 'view/view.php';
        include_once 'model/model.php';

        $model = new Model();
        $view = new View();

        $view->render('main.php');
    ?>

<html>

