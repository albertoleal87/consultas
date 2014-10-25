<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="formato.css" type="text/css" rel="stylesheet" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>


<body>

<div id="encabezado">

<h1> Pagina de pruebas </h1>

</div>

<div id="menu">    

</div>


<div id="cuerpo">

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

Usuario: <input type="usuario" name="Usuario"> <br>
Contraseña: <input type="password" name="pass">

<input type="submit" value="Enviar">
</form>
<?php

$us = "admin";
$pw = "admin";

if (isset($_POST['pass']) && isset($_POST['Usuario']) && $_POST['pass'] == $pw && $_POST['Usuario'] == $us )
{header("Location: Consultas.php");}
else 	{echo "  \"Favor de ingresar Usuario y Contraseña\"  ";}

?>

</div>

<div id="pie">
<h3>	

Pie de pagina

</h3>
</div>


</body>

</html>
