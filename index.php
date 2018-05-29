<?php

$data = [];

for($i = 0; $i < 10; $i++){
	$datosfor['label'] = "Label: ".$i;
	$datosfor['value'] = $i*10;
	
	$data['values'][] = $datosfor;
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>nosenose</title>
</head>
<body>
	<form action="simpleBarChart.php" method="POST">
		<input type='hidden' name='data' value='<?php echo serialize($data); ?>' />
		<input type="submit" value="Enviar Datos Normal">
	</form>
	<form action="calidadBarChart.php" method="POST">
		<input type='hidden' name='data' value='<?php echo serialize($data); ?>' />
		<input type="submit" value="Enviar Datos Calidad">
	</form>
</body>
</html>