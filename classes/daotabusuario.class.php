<?php

 require "tabusuario.class.php";

 class DaoTabUsuario{
 	public function CadastrarUsuario(TabUsuario $t){
 		$stmt = Conecta::abrirConexao()->prepare('INSERT INTO usuario (nome, email, usuario, senha, cargoid) VALUES(:nome, :email, :usuario, :senha, 1);') ;
 		$stmt->bindValue(":nome", $t->getNome());
 		$stmt->bindValue(":email", $t->getEmail());
 		$stmt->bindValue(":usuario", $t->getUsuario());
 		$stmt->bindValue(":senha", $t->getSenha());
   		 if($stmt->execute())
   		 	return 1;
   		 else
   		 	return 0;
 	 }
	 public function Login($u, $s){
		$stmt = Conecta::abrirConexao()->prepare('SELECT * FROM usuario WHERE usuario = :u AND senha = :s');
		$stmt->bindValue(":u", $u);
		$stmt->bindValue(":s", $s);
		$stmt->execute();
		if($stmt->rowCount() > 0)
			return true;
		else
			return false;
	 }
	 public function RetornaID($u){
		$stmt = Conecta::abrirConexao()->prepare('SELECT * FROM usuario WHERE usuario = :u');
		$stmt->bindValue(":u", $u);
		$stmt->execute();
		$row = $stmt->fetch();
		return $row["id"];
	 }
	 public function TrocarSenha($id, $senha){
		$stmt = Conecta::abrirConexao()->prepare('UPDATE usuario SET senha=:senha WHERE id = :i');
		$stmt->bindValue(":i", $id);
		$stmt->bindValue(":senha", $senha);
		return $stmt->execute();
	 }
	 public function Promover($id, $cargoid){
		$stmt = Conecta::abrirConexao()->prepare('UPDATE usuario SET cargoid=:cid WHERE id = :i');
		$stmt->bindValue(":i", $id);
		$stmt->bindValue(":cid", $cargoid);
		return $stmt->execute();
	 }
	 public function AtualizarInfo($id, $nome, $email, $usuario){
		$stmt = Conecta::abrirConexao()->prepare('UPDATE usuario SET nome=:n, email=:e, usuario=:u WHERE id = :i');
		$stmt->bindValue(":i", $id);
		$stmt->bindValue(":n", $nome);
		$stmt->bindValue(":e", $email);
		$stmt->bindValue(":u", $usuario);
		return $stmt->execute();
	 }
	 public function UsuDispo($user){
		 $stmt = Conecta::abrirConexao()->prepare('SELECT * FROM usuario WHERE usuario = :user');
		 $stmt->bindValue(":user", $user);
		 $stmt->execute();
		 if($stmt->rowCount() > 0)
			 return true;
		 else
			 return false;
	 }
 	 public function Deletar($i){
 	 	$stmt = Conecta::abrirConexao()->prepare("DELETE FROM usuario WHERE usuario.id = :id;");
 	 	$stmt->bindValue(":id", $i);
 	 	if($stmt->execute())
 	 		return true;
 	 	else
 	 		return false;
 	 }
 	public function listarUsuarios(){
 		$stmt = Conecta::abrirConexao()->prepare('SELECT 
u.id as id,
u.nome as nome,
u.usuario as usuario,
u.senha as senha,
u.email as email,
c.nome as cargo,
u.cargoid as cargoid

FROM usuario as u
INNER JOIN cargo c
ON u.cargoid = c.id');
 		$stmt->execute();
 		$resul = array();
 		while($row = $stmt->fetch(PDO::FETCH_OBJ)){
 			array_push($resul, $row);
 		}
 		return $resul;
 	}
 	public function listarUsuarios2($usuario){
 		$stmt = Conecta::abrirConexao()->prepare('SELECT 
u.id as id,
u.nome as nome,
u.usuario as usuario,
u.senha as senha,
u.email as email,
c.nome as cargo,
u.cargoid as cargoid

FROM usuario as u
INNER JOIN cargo c
ON u.cargoid = c.id

WHERE u.usuario LIKE :us; 
');
 		$stmt->bindValue(":us", "%" . $usuario . "%");
 		$stmt->execute();
 		$resul = array();
 		while($row = $stmt->fetch(PDO::FETCH_OBJ)){
 			array_push($resul, $row);
 		}
 		return $resul;
 	}
 	public function listarUsuarios3($usuario){
 		$stmt = Conecta::abrirConexao()->prepare('SELECT 
u.id as id,
u.nome as nome,
u.usuario as usuario,
u.senha as senha,
u.email as email,
c.nome as cargo,
u.cargoid as cargoid

FROM usuario as u
INNER JOIN cargo c
ON u.cargoid = c.id

WHERE u.email LIKE :us; 
');
 		$stmt->bindValue(":us", "%" . $usuario . "%");
 		$stmt->execute();
 		$resul = array();
 		while($row = $stmt->fetch(PDO::FETCH_OBJ)){
 			array_push($resul, $row);
 		}
 		return $resul;
 	}
 	public function listarUsuarios4($usuario){
 		$stmt = Conecta::abrirConexao()->prepare('SELECT 
u.id as id,
u.nome as nome,
u.usuario as usuario,
u.senha as senha,
u.email as email,
c.nome as cargo,
u.cargoid as cargoid

FROM usuario as u
INNER JOIN cargo c
ON u.cargoid = c.id

WHERE u.nome LIKE :us; 
');
 		$stmt->bindValue(":us", "%" . $usuario . "%");
 		$stmt->execute();
 		$resul = array();
 		while($row = $stmt->fetch(PDO::FETCH_OBJ)){
 			array_push($resul, $row);
 		}
 		return $resul;
 	}
 	public function PegarUsuario($id){
 		$stmt = Conecta::abrirConexao()->prepare('SELECT 
 			u.id as id,
u.nome as nome,
u.usuario as usuario,
u.senha as senha,
u.email as email,
c.nome as cargo,
u.cargoid as cargoid
FROM usuario as u
INNER JOIN cargo c
ON u.cargoid = c.id
WHERE u.id = :id;
 ');
 		$stmt->bindValue(":id", $id);
 		$stmt->execute();
 		$fofo;
 		while($row = $stmt->fetch(PDO::FETCH_OBJ)) {
    		$fofo = $row;
		}
		return $fofo;
 	}
 }
?>