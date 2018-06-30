<?php
	require "../classes/daotabrelatorio.class.php";	

	$dao = new DaoTabRelatorio;	
	$jupc =  $dao->UsuariosPorCompra();
	$jppm =  $dao->PagamentosPorMes();	
	$jpmc =  $dao->PacotesMaisComprados();	
	$jsmc = $dao->ServidorMaisComentado();

	?>
<div class="row">
    <div class="col-lg-12">
	
        <h1>Relatorios <small id="s2">Gerenciar relatorios. </small></h1>                   
    </div>
</div>

<div class="row">	
    <div class="col-lg-12">   
    	<div class="panel panel-primary">
			<div class="panel-heading">Relatorios</div>
			<div class="panel-body"> 	
				<div class="row">	
    				<div class="col-md-12"> 
    					<div class="panel panel-primary">
    						<div class="panel-heading">
    							<h5>Usuarios por compra</h5>
    						</div>
    						<div class="panel-body">
    							<div id="grafico_upc">
    							</div>
    						</div>    					
    					</div>
   					</div>
   					<div class="col-md-12"> 
   						<div class="panel panel-primary">
   							<div class="panel-heading">
								<h5>Pagamentos por mes</h5>
    						</div>   							
    						<div class="panel-body">
    					 		<div id="grafico_ppm">
    					 		</div>
    						</div>
   						</div>
   					</div>
   					<div class="col-md-12"> 
   						<div class="panel panel-primary">
   							<div class="panel-heading">
   								<h5>Pacotes por compras</h5>
    						</div>
    						<div class="panel-body">
    							<div id="grafico_pmc">
    					 		</div>
    					 	</div>    					
    					</div>
   					</div>
   					<div class="col-md-12"> 
   						<div class="panel panel-primary">
   							<div class="panel-heading">
   								<h5>Servidores por comentario</h5>
    						</div>
    						<div class="panel-body">
		    					<div id="grafico_smc">
		    					</div>
    						</div>    					
    					</div>
   					</div>
   				</div>
			</div>
		</div>
	</div>
</div>
<script>
	google.charts.load('current', {'packages':['corechart']});
	
  	google.charts.setOnLoadCallback(drawupc);
  	google.charts.setOnLoadCallback(drawppm);
  	google.charts.setOnLoadCallback(drawpmc);
  	google.charts.setOnLoadCallback(drawsmc);
  	var options = { 
        is3D: true,
        'backgroundColor': 'transparent',
		legendTextStyle: { color: '#FFF' },
		titleTextStyle: { color: '#FFF' },			
		legend: {
			textStyle : {
				fontSize: 15,
				color: 'white',
				
			}
		}
	};		
 	function drawupc(){  

  		var data = new google.visualization.DataTable(<?php echo $jupc; ?>);
        var chart = new google.visualization.PieChart(document.getElementById('grafico_upc'));
        chart.draw(data, options);
  	}
  	function drawppm(){
  		var data = new google.visualization.DataTable(<?php echo $jppm; ?>);  		

        var chart = new google.visualization.PieChart(document.getElementById('grafico_ppm'));
        chart.draw(data, options);
  	}
  	function drawpmc(){
		var data = new google.visualization.DataTable(<?php echo $jpmc; ?>);
        var chart = new google.visualization.PieChart(document.getElementById('grafico_pmc'));
        chart.draw(data, options);
  	}
  	function drawsmc(){
		var data = new google.visualization.DataTable(<?php echo $jsmc; ?>);
        var chart = new google.visualization.PieChart(document.getElementById('grafico_smc'));
        chart.draw(data, options);
  	}

</script>