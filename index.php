<?php 

    include 'controller/FormController.php';



$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

switch ($url) {
    case '/':
       FormController::listarMensagens();
     break;

     case '/cadastrar':
        FormController::cadastrarmsg();
        break;
    
     case '/notification-center':
            FormController::lerNotificacoes();
        break;
     
     case '/update-notification':
            FormController::MarcarComoLida();
         break;   


        
    default:
        echo  "<h1 style='font-size:100px;color: red;text-align: center;margin-top:90px;'>ERRO 404 ROTA NÃO ENCONTRADA <br> <br> </h1>";

        header("refresh:6;url=/");

        echo "<h1 style='font-size:100px;color: purple;text-align: center;'> Você será redirecionado para a pagina inicial em 5 segundos </h1> ";
    break;
}