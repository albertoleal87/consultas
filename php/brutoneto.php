<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
<title>Funciones</title>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1">
</head>
<body>
<h2>Convertir bruto a neto</h2>
<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
<input type="text" name="numero">
<input type="submit" value="Calcular">
</form>
<?php



if (isset($_POST['numero'])){

$zw = $_POST['numero'];
$zw = $zw / 1.16;
$zw = sprintf("%01.2f", $zw);
echo $zw;}   
 
	
?>
</body>
</html>