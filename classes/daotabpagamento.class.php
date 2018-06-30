<?php
	class DaoTabPagamento{
		public function InserirPagamento($sid, $pid, $uid){
			$stmt = Conecta::abrirConexao()->prepare("INSERT INTO pagamento (servidorid, pacoteid, usuarioid, data) VALUES(:sid, :pid, :uid, CURRENT_DATE );");
			$stmt->bindValue(":sid", $sid);
			$stmt->bindValue(":pid", $pid);
			$stmt->bindValue(":uid", $uid);
			return $stmt->execute();			
		}
		public function PagamentosDe($uid){
			$stmt = Conecta::abrirConexao()->prepare("SELECT * FROM pagamento WHERE usuarioid = :uid");
			$stmt->bindValue(":uid", $uid);
			$stmt->execute();
			$resultado = array();
 			while($row = $stmt->fetch(PDO::FETCH_OBJ)) {
    			array_push($resultado , $row );
			}			
			return $resultado;		
		}
	}
?>