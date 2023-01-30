<!DOCTYPE html>

<html>

    <?php 
        include_once 'view/view.php';
        include_once 'model/model.php';

        $model = new Model();
        $view = new View();

        $view->render('main.php');


        $connector = new PDO('mysql:host=localhost:6044;dbname=mydb;charset=utf8' , 'root', 'root');

        
        //$model->addData($catArray);
        
    ?>




<html>

