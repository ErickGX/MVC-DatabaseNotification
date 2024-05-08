<?php 

class Mensagens {

    private $id;
    private $created_at;
    private $texto_msg;

    public function __construct()
    {
        
    }

    public function getId() {
        return $this->id;
    }
    public function getCreatedAt() {
        return $this->created_at;
    }
    public function getTextoMsg() {
        return $this->texto_msg;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setCreatedAt($created_at) {
        $this->created_at = $created_at;
    }

    public function setTextoMsg($texto_msg) {
        $this->texto_msg = $texto_msg;
    }
}


