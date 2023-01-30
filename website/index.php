<!DOCTYPE html>

<html>

    <?php 
        include_once 'view/view.php';

        $view = new View();

        $view->render('main.php');


    $connector = new PDO('mysql:host=localhost:6044;dbname=mydb;charset=utf8' , 'root', 'root');



    $catArray = array("Livre", "Sport", "Art", "Nature", "Voyage", "Culture", "Photographie", "Gastronomie", "Science", "Humanitaire", "Technologie", "Cinéma", "Histoire", "Musique", "Science-fiction", "Fantasy", "Mode");
    $idArray = range(1, count($catArray));

    $cat = array_combine($idArray, $catArray);

    
    $req = $connector->query('DELETE FROM db_cif.t_categorie');
 
    foreach ($cat as $id => $categorie) {
        $stmt = $connector->prepare("INSERT INTO db_cif.t_categorie (idCategorie, catTitre)
        VALUES (:idCategorie, :catTitre)");
        $stmt->bindParam(':idCategorie', $id);
        $stmt->bindParam(':catTitre', $categorie);
        $stmt->execute();
      }


    
    ?>

<html>

