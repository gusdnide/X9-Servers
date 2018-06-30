<?php
	class TabJogo{
		private $id, $nome, $img;
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
		public function getImg(){
			return $this->img;
		}
		public function setImg($i){
			$this->img = $i;
		}
	}
?>