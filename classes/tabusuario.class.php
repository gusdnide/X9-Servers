<?php
	class TabUsuario{
		private $id, $nome, $email, $usuario, $senha, $cargoid;
		public function getId(){
			return $this->id;
		}
		public function setId($i){
			$this->id = $i;
		}
		public function getNome(){
			return $this->nome;
		}
		public function setNome($i){
			$this->nome = $i;
		}
		public function getEmail(){
			return $this->email;
		}
		public function setEmail($i){
			$this->email = $i;
		}
		public function getUsuario(){
			return $this->usuario;
		}
		public function setUsuario($i){
			$this->usuario= $i;
		}
		public function getSenha(){
			return $this->senha;
		}
		public function setSenha($i){
			$this->senha = $i;
		}
		public function getCargoid(){
			return $this->cargoid;
		}
		public function setCargoid($i){
			$this->cargoid = $i;
		}
	}
?>