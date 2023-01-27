<!DOCTYPE html>

<html>

    <?php 
        include 'controller/ControllerBasePage.php';
        WriteBasePage(0);

        

    // Se connecter via PDO
    $connector = new PDO('mysql:host=localhost:6044;dbname=mydb;charset=utf8' , 'root', 'root');

    $req = $connector->query("INSERT INTO db_cif.t_categorie (catTitre) VALUES ('Livre')");

    ?>

<html>