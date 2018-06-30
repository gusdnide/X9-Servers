<?php
	class TabServidor{
		private $id, $nome, $ip, $jogoid;
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
			$this->nome = $nome;
		}

		public function getIp(){
			return $this->ip;
		}
		public function setIp($i){
			$this->ip = $i;
		}

		public function getJogoid(){
			return $this->jogoid;
		}
		public function setJogoid($i){
			$this->jogoid = $i;
		}
	}
?>