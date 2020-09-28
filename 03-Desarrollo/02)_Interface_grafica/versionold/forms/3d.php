<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>Highcharts Example</title>
        
    
        <?php
        include_once '../clases/class.producto.php';

        ?>
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
		<style type="text/css">
#container {
	height: 400px; 
	min-width: 310px; 
	max-width: 800px;
	margin: 0 auto;
}
		</style>
		<script type="text/javascript">
$(function () {
    $('#container').highcharts({
        chart: {
            type: 'column',
            margin: 75,
            options3d: {
                enabled: true,
                alpha: 10,
                beta: 25,
                depth: 70
            }
        },
        title: {
            text: 'Inventario general de Porductos'
        },
        subtitle: {
            text: ''
        },
        plotOptions: {
            column: {
                depth: 25
            }
        },
        xAxis: {
            categories: [
            <?php
            $datos = Producto::verProductosGrafica();
            while( $row = $datos->fetch_assoc()){
             ?>
             [ '<?php  echo $row['nom_prod']  ?>' ],
<?php } ?>
]   
        },
        yAxis: {
            title: {
                text: null
            }
        },
        series: [{
            name: 'Cantidad',
            data: [
            <?php     
            $datos = Producto::verProductosGrafica();
            while( $row = $datos->fetch_assoc()){
            ?>
            [ <?php echo $row['stok_prod'] ?> ],
            <?php  }  ?>  ]
        }]
    });
});
		</script>
	</head>
	<body>

<script src="js/highcharts.js"></script>
<script src="js/highcharts-3d.js"></script>
<script src="js/modules/exporting.js"></script>
<div id="container" style="height: 400px"></div>
	</body>
</html>
