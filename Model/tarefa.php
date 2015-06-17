<?php
class Tarefa {
    private $id;
    private $nome;
    private $dataFinalizacao;
    private $descricao;
    private $ativo;

    public function setID($id) {
        $this->id = $id;
    }
    public function getId() {
        return $this->id;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setDataFinalizacao($data){
        $this->dataFinalizacao = $data;
    }

    public function getDataFinalizacao(){
        return $this->dataFinalizacao;
    }

    public function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    public function getDescricao() {
        return $this->descricao;
    }

    public function setAtivo($ativo) {
        $this->ativo = $ativo;
    }

    public function getAtivo() {
        return $this->ativo;
    }

    public function toString(){
        return "ID :".$this->getID()." Nome: ".$this->getNome()."Descricao: ".$this->getDescricao()." Data".$this->getDataFinalizacao()." Ativo: ".$this->getAtivo();
    }
}

?>