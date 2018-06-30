<?php
	require "tabjogo.class.php";
	class DaoTabJogo{
		public function listarJogo(){
 			$stmt = Conecta::abrirConexao()->prepare('SELECT * FROM jogo');
 			$stmt->execute();
 			$resultado = array();
 			while($row = $stmt->fetch(PDO::FETCH_OBJ)) {
    			array_push($resultado , $row );
			}
			return $resultado;
 		}
		public function Inserir($n, $i){
			$stmt = Conecta::abrirConexao()->prepare('INSERT INTO jogo (nome, img) VALUES(:n, :i)');
			$stmt->bindValue(":n", $n);
			$stmt->bindValue(":i", $i);
			return $stmt->execute();
		}
		public function Deletar( $i){
			$stmt = Conecta::abrirConexao()->prepare('DELETE FROM jogo WHERE id = :i');
			$stmt->bindValue(":i", $i);
			return $stmt->execute();
		}
	}
	
?>