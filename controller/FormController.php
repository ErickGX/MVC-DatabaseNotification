<?php


//echo '<pre>', var_dump($_POST), '</pre>';
class FormController
{


    public static function cadastrarmsg()
    {

        include_once 'dao/FormDAO.php';
        include_once 'models/Form.php';
        include 'connection/Connection.php';


        if (isset($_POST['enviar'])) {
            if (!empty($_POST['manual'])) {
                // O campo 'manual' foi preenchido
                $dados = ['mensagem' => $_POST['manual']];

            } elseif (!empty($_POST['predefinida'])) {
                // O campo 'predefinido' foi preenchido
                $dados = ['mensagem' => $_POST['predefinida']];
            } else {
                // Nenhum dos campos foi preenchido
                $dados = ['mensagem' => null];
            }

            $dados += [
                'destinatario' => $_POST['destinatario'],
                'turma' => $_POST['turma'],
                'agendamento_envio' => $_POST['date'],
                'categoria_aviso' => $_POST['tipoaviso'],
                'encaminhamento' => $_POST['encaminhamento'],

            ];

            // print_r($dados);
            //print para debug

            $mensagem = new Form();
            $mensagem->setDestinatario($dados['destinatario']);
            $mensagem->setTurma($dados['turma']);
            $mensagem->setAgendamentoEnvio($dados['agendamento_envio']);
            $mensagem->setCategoriaAviso($dados['categoria_aviso']);
            $mensagem->setMensagem($dados['mensagem']);
            $mensagem->setViaEncaminhamento($dados['encaminhamento']);



            $mensagemdao = new FormDAO();

            $mensagemdao->create($mensagem);

        }
        header('Location: /notification-center');


    }




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


    public static function lerNotificacoes()
    {

        include_once 'dao/FormDAO.php';
        include_once 'models/Form.php';
        include 'connection/Connection.php';

        $notificacaodao = new FormDAO();

        $notificacoes = $notificacaodao->readAll();


          //echo '<pre>', var_dump($notificacoes), '</pre>';


          $arrayNormal = [];

        foreach ($notificacoes as $objeto) {
            $arrayNormal[] = [
                'id' => $objeto->getId(),
                'created_at' => $objeto->getCreatedAt(),
                'mensagem_vista' => $objeto->getMensagemVista(),
                'read_at' => $objeto->getReadAt(),
                'destinatario' => $objeto->getDestinatario(),
                'agendamento_envio' => $objeto->getAgendamentoEnvio(),
                'categoria_aviso' => $objeto->getCategoriaAviso(),
                'mensagem' => $objeto->getMensagem(),
                'turma' => $objeto->getTurma(),
                'via_encaminhamento' => $objeto->getViaEncaminhamento()                
            ];
        }

        echo '<pre>', var_dump($arrayNormal), '</pre>';

        

        include 'views/notification_center.php';

    }


}
