    <?php 
    
        class Form {
            private $id;
            private $created_at;

            private $mensagem_vista;
            private $read_at;
            private $destinatario;
            private $agendamento_envio;
            private $categoria_aviso;
            private $mensagem;
            private $turma;
            private $via_encaminhamento;

            public function __construct() {
            }


            public function getId() {
                return $this->id;
            }
            public function getCreatedAt() {
                return $this->created_at;
            }
            public function getMensagemVista() {
                return $this->mensagem_vista;
            }
            public function getReadAt() {
                return $this->read_at;
            }
            public function getDestinatario() {
                return $this->destinatario;
            }
            public function getAgendamentoEnvio() {
                return $this->agendamento_envio;
            }

            public function getCategoriaAviso() {
                return $this->categoria_aviso;
            }
            public function getMensagem() {
                return $this->mensagem;
            }
            public function getTurma() {
                return $this->turma;
            }
            public function getViaEncaminhamento() {
                return $this->via_encaminhamento;
            }

            ///// Setters
    

            public function setId($id){
                $this->id = $id;
            }

            public function setCreatedAt($created_at){
                $this->created_at = $created_at;
            }
            public function setMensagemVista($mensagem_vista){
                $this->mensagem_vista = boolval($mensagem_vista);
            }
            public function setReadAt($read_at){
                $this->read_at = $read_at;
            }
               //todos os campos acimas sao preenchidos automaticamente pelo banco 
            public function setDestinatario($destinatario){
                $this->destinatario = $destinatario;
            }
           
            public function setTurma($turma){
                $this->turma = $turma;
            }
            public function setAgendamentoEnvio($agendamento_envio){
                $this->agendamento_envio = $agendamento_envio;
            }

            public function setCategoriaAviso($categoria_aviso){
                $this->categoria_aviso = $categoria_aviso;
            }
            public function setMensagem($mensagem){
                $this->mensagem = $mensagem;
            }
            
            public function setViaEncaminhamento($via_encaminhamento){
                $this->via_encaminhamento = $via_encaminhamento;
            }


        }
    
    ?>