<?php
	class DaoTabRelatorio{
		public function UsuariosPorCompra(){
			$sql = "SELECT count(servidorid) as Quantidade, u.nome as Nome FROM pagamento as p INNER JOIN usuario as u ON u.id  =  p.usuarioid GROUP BY Nome ORDER BY Quantidade DESC LIMIT 10";
			$stmt = Conecta::abrirConexao()->prepare($sql);
			$stmt->execute();
			$table['cols'] = array(
    			array('label' => 'Nome', 'type' => 'string'),
    			array('label' => 'Quantidade', 'type' => 'number')
			);
			$row;
			while($r = $stmt->fetch(PDO::FETCH_ASSOC)){
				$temp = array();
				$temp[] = array('v' => (string) $r['Nome']); 
			    $temp[] = array('v' => (int) $r['Quantidade']); 			   
			    $rows[] = array('c' => $temp);
			}
			$table['rows'] = $rows;
			return json_encode($table);
		}
		public function retMes($i){
			switch ($i) {
				case '1':
					return "Janeiro";
				case '2':
					return "Fevereiro";
				case '3':
					return "Março";
				case '4':
					return "Abril";
				case '5':
					return "Maio";
				case '6':
					return "Junho";
				case '7':
					return "Julho";
				case '8':
					return "Agosto";
				case '9':
					return "Outubro";
				case '10':
					return "Setembro";
				case '11':
					return "Novembro";
				case '12':
					return "Dezembro";

			}
		}
		public function PagamentosPorMes(){
			$sql = "SELECT COUNT(MONTH(p.data)) AS Quantidade, MONTH(p.data) AS Mes FROM pagamento as p GROUP BY MONTH(p.data) LIMIT 10;";
			$stmt = Conecta::abrirConexao()->prepare($sql);
			$stmt->execute();
			$table['cols'] = array(
    			array('label' => 'Mes', 'type' => 'string'),
    			array('label' => 'Quantidade', 'type' => 'number')
			);
			$row;
			while($r = $stmt->fetch(PDO::FETCH_ASSOC)){
				$temp = array();
				$temp[] = array('v' => (string) $this->retMes($r['Mes'])); 
			    $temp[] = array('v' => (int) $r['Quantidade']); 			   
			    $rows[] = array('c' => $temp);
			}
			$table['rows'] = $rows;
			return json_encode($table);
		}
		public function PacotesMaisComprados(){
			$sql = "SELECT count(servidorid) as Quantidade, u.nome as Nome FROM pagamento as p INNER JOIN pacote as u ON p.pacoteid = u.id GROUP BY u.id LIMIT 10";
			$stmt = Conecta::abrirConexao()->prepare($sql);
			$stmt->execute();
			$table['cols'] = array(
    			array('label' => 'Pacote', 'type' => 'string'),
    			array('label' => 'Quantidade', 'type' => 'number')
			);
			$row;
			while($r = $stmt->fetch(PDO::FETCH_ASSOC)){
				$temp = array();
				$temp[] = array('v' => (string) $r['Nome']); 
			    $temp[] = array('v' => (int) $r['Quantidade']); 			   
			    $rows[] = array('c' => $temp);
			}
			$table['rows'] = $rows;
			return json_encode($table);
		}
		public function ServidorMaisComentado(){
			$sql = "SELECT COUNT(c.id) as Quantidade, s.nome as Nome FROM comentario as c INNER JOIN servidor as s on c.servidorid = s.id GROUP BY(s.nome) LIMIT 10";
			$stmt = Conecta::abrirConexao()->prepare($sql);
			$stmt->execute();
			$table['cols'] = array(
    			array('label' => 'Nome', 'type' => 'string'),
    			array('label' => 'Quantidade', 'type' => 'number')
			);
			$row;
			while($r = $stmt->fetch(PDO::FETCH_ASSOC)){
				$temp = array();
				$temp[] = array('v' => (string) $r['Nome']); 
			    $temp[] = array('v' => (int) $r['Quantidade']); 			   
			    $rows[] = array('c' => $temp);
			}
			$table['rows'] = $rows;
			return json_encode($table);
		}
	}
?>