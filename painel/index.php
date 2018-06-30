<?php
    include "../classes/conexao.php";
	include "../sec.php";
    require "../classes/daotabusuario.class.php";	
	if(!isset($_SESSION['iduser']))
		header("Location: ../login.php");
	
    $pagina = 1;
    $daoU = new DaoTabUsuario;
    $Usuario = $daoU->PegarUsuario($_SESSION['iduser']);
    if(isset($_GET['p'])){
        $pagina = $_GET['p'];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="css/local.css" />
    
    <script type="text/javascript" src="gstatic/loader.js"></script>
    <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript">
            function red(te){
                console.log(te);
                window.location.href = te;
            }
        </script>
	<style>
		.t{
			font-size: 13px;
			color: orange;
		}
		.t2{
			font-size: 11px;
			color: red;
		}
	</style>

</head>
<body>
    <div id="wrapper">
          <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="../index.php">Painel</a>
            </div>
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul id="active" class="nav navbar-nav side-nav">
                    <li <?php if($pagina == 1 || $pagina == 'p') echo 'class="selected"'; ?>><a href="index.php?p=p"><i class="fa fa-id-card"></i> Perfil</a></li>
                    <li <?php if($pagina == 'c') echo 'class="selected"'; ?>><a href="index.php?p=c"><i class="fa fa-money"></i> Comprar</a></li>
					<li <?php if($pagina == 's') echo 'class="selected"'; ?>><a href="index.php?p=s"><i class="fa fa-globe"></i> Servidores</a></li>                              
                    <?php if($Usuario->cargoid != 1 ){ ?>
                       <li <?php if($pagina == 'su') echo 'class="selected"'; ?>><a href="index.php?p=su"><i class="fa fa-comment"></i> Sugestoes</a></li>
                        <?php if($Usuario->cargoid == 3 ) {?>
        					<li <?php if($pagina == 'u') echo 'class="selected"'; ?>><a href="index.php?p=u"><i class="fa fa-user-o"></i> Usuarios</a></li>
        					<li <?php if($pagina == 'r') echo 'class="selected"'; ?>><a href="index.php?p=r"><i class="fa fa-line-chart"></i> Relatorios</a></li>
                            <li <?php if($pagina == 'j') echo 'class="selected"'; ?>><a href="index.php?p=j"><i class="fa fa-gamepad"></i> Jogos</a></li>
                        <?php } ?>
					<?php } ?>
                </ul>
                <ul class="nav navbar-nav navbar-right navbar-user">                    
                    <li class="dropdown user-dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $Usuario->nome ?><b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="logoff.php"><i class="fa fa-power-off"></i> Sair</a></li>
                        </ul>
                    </li>                   
                </ul>
            </div>
        </nav>

        <div id="page-wrapper">
            <?php
                if($pagina == 1){
                    require "perfil.php";
                }else{
                    switch ($pagina) {
                    case 'u':
                        require "usuarios.php";
                        break;
                    case 's':
                        require "servidores.php";
                        break;
                    case 'c':
                        require "compras.php";
                        break;
                    case 'p':
                        require "perfil.php";
                        break;
                    case 'r':
                        require "relatorio.php";
                        break;
                    case 'j':
                        require "jogos.php";
                        break;
                    case 'su':
                        require "sugestao.php";
                        break;
                    default:
                        require "perfil.php";
                        break;
                    }
                }
               ?>
        </div>
    </div>    
</body>
</html>
