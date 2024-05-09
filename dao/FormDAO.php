<?php 


class FormDAO {

    public function create(Form $mensagem){

        //echo '<pre>' , var_dump($mensagem) , '</pre>';

        try {
            
            $sql = 'INSERT INTO notificacoes (destinatario, agendamento_envio, categoria_aviso, mensagem, turma, via_encaminhamento)
                    VALUES (:destinatario, :agendamento_envio, :categoria_aviso, :mensagem, :turma, :via_encaminhamento);
                    ';

            $stmt = Connection::getConnection()->prepare($sql);
            
            $stmt->bindValue(':destinatario', $mensagem->getDestinatario(), PDO::PARAM_STR);
            $stmt->bindValue('agendamento_envio', $mensagem->getAgendamentoEnvio(), PDO::PARAM_STR);
            $stmt->bindValue('categoria_aviso', $mensagem->getCategoriaAviso(), PDO::PARAM_STR);
            $stmt->bindValue('mensagem', $mensagem->getMensagem(), PDO::PARAM_STR);
            $stmt->bindValue('turma', $mensagem->getTurma(), PDO::PARAM_STR);
            $stmt->bindValue('via_encaminhamento', $mensagem->getViaEncaminhamento(), PDO::PARAM_STR);

            return $stmt->execute();


        } catch (Exception $e) {
           echo "Erro ao cadastrar a mensagem no banco de dados  <br> " . $e . "<br>";
        }

    }

    public function readAll(){
        try {
            $sql = 'SELECT * FROM notificacoes';
    
            $stmt = Connection::getConnection()->prepare($sql);
    
            $stmt->execute();
    
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
            $list = array();
    
            foreach ($data as $row) {
    
                $list[] = $this->list($row);
    
            }
    
            return $list;
    
        } catch (Exception $e) {
    
            echo 'Erro ao listar notificacoes.<br>' . $e . '<br>';
    
        }
    
    }
    
    
    private function list($row) {
    
        $notificacoes = new Form();

        $notificacoes->setId($row['id']);
        $notificacoes->setCreatedAt($row['created_at']);
        $notificacoes->setMensagemVista($row['mensagem_vista']);
        $notificacoes->setReadAt($row['read_at']);
        $notificacoes->setDestinatario($row['destinatario']);
        $notificacoes->setTurma($row['turma']);
        $notificacoes->setAgendamentoEnvio($row['agendamento_envio']);
        $notificacoes->setCategoriaAviso($row['categoria_aviso']);
        $notificacoes->setMensagem($row['mensagem']);
        $notificacoes->setViaEncaminhamento($row['via_encaminhamento']);
      
        return $notificacoes;
     }




     /*  //Funcao para dar update nos campos read_At e no campo mensagem_vista atraves do ip capturado no controller
     public function updateNotification(){
        try {
            $sql = 'SELECT * FROM notificacoes';
    
            $stmt = Connection::getConnection()->prepare($sql);
    
            $stmt->execute();
    
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
            $list = array();
    
            foreach ($data as $row) {
    
                $list[] = $this->list($row);
    
            }
    
            return $list;
    
        } catch (Exception $e) {
    
            echo 'Erro ao listar notificacoes.<br>' . $e . '<br>';
    
        }
    
    }
*/




}
