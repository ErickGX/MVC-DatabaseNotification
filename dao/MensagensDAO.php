<?php 


class MensagemDAO{
    public function readAll(){
        try {
            $sql = 'SELECT * FROM mensagens_padrao';
    
            $stmt = Connection::getConnection()->prepare($sql);
    
            $stmt->execute();
    
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
            $list = array();
    
            foreach ($data as $row) {
    
                $list[] = $this->list($row);
    
            }
    
            return $list;
    
        } catch (Exception $e) {
    
            echo 'Erro ao carregar mensagens.<br>' . $e . '<br>';
    
        }
    
    }
    
    
    private function list($row) {
    
        $msg_padrao = new Mensagens();
    
        $msg_padrao->setId($row['id']);
        $msg_padrao->setCreatedAt($row['created_at']);
        $msg_padrao->setTextoMsg($row['texto_msg']);
    
        
        return $msg_padrao;
    
        
    }
}