<!DOCTYPE html>

<html>

    <?php 
        include_once 'view/view.php';

        $view = new View();

        $view->render('main.php');

    // Se connecter via PDO
    //$connector = new PDO('mysql:host=localhost:6044;dbname=mydb;charset=utf8' , 'root', 'root');


    /* TRUCS DE JOAO

    $catArray = array("Livre", "Sport", "Art", "Nature", "Voyage", "Culture", "Photographie", "Gastronomie", "Science", "Humanitaire", "Technologie", "Cinéma", "Histoire", "Musique", "Science-fiction", "Fantasy", "Mode");
    $idArray = range(1, count($catArray));

    $req = $connector->query("DELETE FROM db_cif.t_categorie");

    for ($i = 0; $i < count($catArray); $i++) {
        $query = "INSERT INTO t_categorie (idCategorie, catTitre) VALUES ($idArray[$i], '$catArray[$i]')";
        $connector->query($query);
    }
    */
    ?>
<html>