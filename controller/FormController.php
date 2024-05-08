<?php


echo '<pre>', var_dump($_POST), '</pre>';
class FormController
{
// 

    public static function listarMensagens()
    {

        include_once 'dao/MensagensDAO.php';
        include_once 'models/Mensagens.php';
        include 'connection/Connection.php';

        $mensagemdao = new MensagemDAO();
        $mensagens = $mensagemdao->readAll();


        // echo '<pre>', var_dump($mensagens), '</pre>';



        $arrayNormal = [];

        foreach ($mensagens as $objeto) {
            $arrayNormal[] = [
                'id' => $objeto->getId(),  
                'created_at' => $objeto->getCreatedAt(),
                'texto_msg' => $objeto->getTextoMsg(),
            ];
        }

        // Agora, $arrayNormal é um array de arrays associativos
        //print_r($arrayNormal);


        //echo '<br><pre>', var_dump($arrayNormal), '</pre>';

        include 'views/formView.php';

    }

}