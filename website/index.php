<!DOCTYPE html>

<html>

    <?php 
        include_once 'view/view.php';
        include_once 'model/ModelCategorie.php';

        $model = new ModelCategorie();
        $view = new View();

        $view->render('main.php');

        $model->addData("yolo");


        $connector = new PDO('mysql:host=localhost:6044;dbname=mydb;charset=utf8' , 'root', 'root');

        
        //$model->addData($catArray);
        
    ?>




<html>

