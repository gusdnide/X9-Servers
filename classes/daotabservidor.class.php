<?php
	
	require "tabservidor.class.php";
	class DaoTabServidor{
		public function listarServers($jogo){
 			$stmt = Conecta::abrirConexao()->prepare('SELECT s.id as id, s.nome as nome, s.ip as ip, s.porta as porta, c.nome as pacote, s.banner as banner, s.maxjogador as maxjogador
FROM pagamento as p
INNER JOIN servidor  as s ON  s.id = p.servidorid 
INNER JOIN pacote as c ON p.pacoteid = c.id
WHERE s.jogoid =  :jogoid');
 			$stmt->bindValue(":jogoid", $jogo);
 			$stmt->execute();
 			$resultado = array();
 			while($row = $stmt->fetch(PDO::FETCH_OBJ)) {
    			array_push($resultado , $row );
			}
			if(!isset($resultado))
				$resultado = -1;
			return $resultado;
 		}
 		public function listarServersDe($jogo, $userid){
 			$stmt = Conecta::abrirConexao()->prepare('SELECT s.id as id, s.nome as nome, s.ip as ip, s.porta as porta, c.nome as pacote, s.banner as banner, s.maxjogador as maxjogador, p.usuarioid as userid
FROM pagamento as p
INNER JOIN servidor  as s ON  s.id = p.servidorid 
INNER JOIN pacote as c ON p.pacoteid = c.id
WHERE s.jogoid =  :jogoid');
 			$stmt->bindValue(":jogoid", $jogo);
 			$stmt->execute();
 			$resultado = array();
 			while($row = $stmt->fetch(PDO::FETCH_OBJ)) {
 				if($row->userid == $userid)
    				array_push($resultado , $row );
    			else 
    				continue;
			}
			return $resultado;
 		}
 		 public function Deletar($i){
	 	 	$stmt = Conecta::abrirConexao()->prepare("DELETE FROM servidor WHERE servidor.id = :id;");
	 	 	$stmt->bindValue(":id", $i);
	 	 	if($stmt->execute())
	 	 		return true;
	 	 	else
	 	 		return false;
 		}
 		public function retornaComentario($id){
 			$stmt = Conecta::abrirConexao()->prepare('SELECT * FROM comentario WHERE servidorid = :id');
 			$stmt->bindValue(":id", $id);
 			$stmt->execute();
 			$resultado;
 			while($row = $stmt->fetch(PDO::FETCH_OBJ)) {
 				if(!isset($resultado))
 					$resultado = array();
    			array_push($resultado , $row );
			}			
			if(!isset($resultado))
				$resultado = -1;
			return $resultado;
 		}
 		public function cadastrarComentario($nome, $texto, $rank, $sid){
 			$stmt = Conecta::abrirConexao()->prepare('INSERT INTO comentario (nome, texto, rank, servidorid) VALUES(:nome, :texto, :rank, :sid);');
 			$stmt->bindValue(":nome", $nome);
 			$stmt->bindValue(":texto", $texto);
 			$stmt->bindValue(":rank", $rank);
 			$stmt->bindValue(":sid", $sid);
 			return $stmt->execute();
 		}
 		public function cadastrarServidor($nome, $ip, $porta, $banner, $maxjogador, $jogoid){
 			$stmt = Conecta::abrirConexao()->prepare('INSERT INTO servidor (nome, ip, porta, banner, maxjogador, jogoid) VALUES(:nome, :ip, :porta, :banner, :maxjogador, :jogoid);');
 			$stmt->bindValue(":nome", $nome);
 			$stmt->bindValue(":ip", $ip);
 			$stmt->bindValue(":porta", $porta);
 			$stmt->bindValue(":banner",$banner);
 			$stmt->bindValue(":maxjogador",$maxjogador);
 			$stmt->bindValue(":jogoid",$jogoid);
 			return $stmt->execute();
 		}
 		public function buscarServidor($id){
 			$stmt = Conecta::abrirConexao()->prepare('
 				SELECT 
	s.id as id,
    s.nome as nome,
    s.ip as ip,
    s.porta as porta,
    j.nome as jogo,
    s.maxjogador as maxjogador,
    s.banner as banner,
    count(c.id) as numcomentario
FROM servidor as s
	INNER JOIN jogo as j ON s.jogoid = j.id
    INNER JOIN comentario as c ON c.servidorid = s.id   
WHERE s.id = :id;

 				');
 			$stmt->bindValue(":id", $id);
 			$stmt->execute();
 			$resultado;
 			while($row = $stmt->fetch(PDO::FETCH_OBJ)) {
    			$resultado = $row;
			}
			if(!isset($resultado))
				$resultado = -1;
			return $resultado;
 		}
	}
?>