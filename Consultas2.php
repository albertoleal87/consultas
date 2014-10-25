<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="formato.css" type="text/css" rel="stylesheet" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Pruebas</title>


<body>

<div id="encabezado">

<h1> Clientes Corporativos "prueba" </h1>

</div>

<div id="menu">
    
       <ul>
        <li><a href="Consultas.php" name="Consultas" >Consultas</a></li>
        
      </ul>

</div>

<div id="cuerpo">

Consultas


<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
RFC: <input type="text" name="rfc"/>
<input type="submit" name="Buscar" value="Buscar"/> 
</form>

<?php

if (isset($_POST['rfc'])){

$rfc = $_POST['rfc'];

$dp = mysql_connect("localhost", "root", "");
mysql_select_db("corporativos", $dp);
$sql = " SELECT * FROM `cias` WHERE rfc='$rfc' ";
$resultado = mysql_query($sql);
$row = mysql_fetch_assoc($resultado);

echo <<<FORMULARIO
<form action="{$_SERVER['PHP_SELF']}" method="post">
<table>	
<tr><td>razon_social:</td><td><input type="text" name="razon_social" value="$row[razon_social]"></td></tr>
<tr><td>status_mig:</td><td><input type="text" name="status_mig"></td></tr>
<tr><td>asesor_cf:</td><td><input type="text" name="asesor_cf"></td></tr>
<tr><td>contacto_admin:</td><td><input type="text" name="contacto_admin"></td></tr>
<tr><td>email_contacto:</td><td><input type="text" name="Locemail_contactoalidad"></td></tr>
<tr><td>tel_contacto:</td><td><input type="text" name="tel_contacto"></td></tr>
<tr><td>comentarios:</td><td><input type="text" name="comentarios"></td></tr>
<tr><td>servicio:</td><td><input type="text" name="servicio"></td></tr>

<input type="submit" value="Actualizar" name="submit"></td></tr>
</table>
</form>
FORMULARIO;

mysql_close($dp);
}
?>

</div>

<div id="pie">
<h3>

Pie de pagina

</h3>
</div>


</body>

</html>
