<?php
class Usuario{
	private $us_id;
	private $us_ativo;
	private $us_nome;
	private $us_email;
	private $us_login;
	private $us_senha;
	private $us_us_nome;
	private $us_data;
	private $us_removido;

	public function getId(){
		return $this->us_id;
	}

	public function setId($us_id){
		$this->us_id=&$us_id;
	}

	public function getAtivo(){
		return $this->us_ativo;
	}

	public function setAtivo($us_ativo){
		$this->us_ativo=&$us_ativo;
	}

	public function getNome(){
		return $this->us_nome;
	}

	public function setNome($us_nome){
		$this->us_nome=&$us_nome;
	}

	public function getEmail(){
		return $this->us_email;
	}

	public function setEmail($us_email){
		$this->us_email=&$us_email;
	}

	public function getLogin(){
		return $this->us_login;
	}

	public function setLogin($us_login){
		$this->us_login=&$us_login;
	}

	public function getSenha(){
		return $this->us_senha;
	}

	public function setSenha($us_senha){
		$this->us_senha=&$us_senha;
	}

	public function getUs_Nome(){
		return $this->us_us_nome;
	}

	public function setUs_Nome($us_us_nome){
		$this->us_us_nome=&$us_us_nome;
	}

	public function getData(){
		return $this->us_data;
	}

	public function setData($us_data){
		$this->us_data=&$us_data;
	}

	public function getRemovido(){
		return $this->us_removido;
	}

	public function setRemovido($us_removido){
		$this->us_removido=&$us_removido;
	}

	public function inserir(){

	}

	public function remover(){

	}

	public function editar(){

	}

	public function selecionar(){

	}
}
?>