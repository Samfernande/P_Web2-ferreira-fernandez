<?php 
    include_once '../view.php';
    $view = new View("test");
    $CIFs = $view->WriteCIF(5);
?>