<?php
class Tarefa {
	private $id;
	private $nome;
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
}

?>