<?php 

    include 'controller/FormController.php';



$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

switch ($url) {
    case '/':
       FormController::listarMensagens();
        break;
    
    default:
        echo  "ERRO 404 NOT FOUND";
        break;
}