<!DOCTYPE html>

<html>

    <?php 
        include_once 'view/view.php';
        include_once 'model/model.php';

        $model = new Model();
        $view = new View();

        $view->render('main.php');

        // $model->addData($catArray)

        $connector = new PDO('mysql:host=localhost:6044;dbname=mydb;charset=utf8' , 'root', 'root');

        $catArray = array("Livre", "Sport", "Art", "Nature", "Voyage", "Culture", "Photographie", "Gastronomie", "Science", "Humanitaire", "Technologie", "Cinéma", "Histoire", "Musique", "Science-fiction", "Fantasy", "Mode");
        $model->addData($catArray);
        
    ?>




<html>

