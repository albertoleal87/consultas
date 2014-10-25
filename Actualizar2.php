<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="formato.css" type="text/css" rel="stylesheet" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Pruebas</title>
<body>

<div id="encabezado">
<h1> Clientes Corporativos "prueba" </h1>
</div> <!--Cierra encabezado -->

<div id="menu">
<ul>
<li><a href="Actualizar2.php" name="Actualizar" >Actualizar</a></li>
</ul>
</div> <!--Cierra menu -->

<div id="cuerpo">
Buscar RFC:
<?php

echo <<<FORMULARIO
<form action="$_SERVER[PHP_SELF]" method="post">
<input type="text" name="rfc" value="
FORMULARIO;

if (isset($_POST['rfc'])){echo"$_POST[rfc]";}
if (isset($row['rfc'])) {echo "$row[rfc]";}

echo <<<FORMULARIO
"/>
<input type="submit" name="Buscar" value="Buscar"/> 
</form>
<br>
FORMULARIO;


if (isset($_POST['rfc']) && !empty($_POST['rfc']) )
{
$rfc = $_POST['rfc'];
$dp = mysql_connect("localhost", "root", "");
mysql_select_db("corporativos", $dp);
$sql = " SELECT * FROM `cias` WHERE rfc='$rfc' ";
$resultado = mysql_query($sql);
$row = mysql_fetch_assoc($resultado);

echo <<<FORMULARIO
<div id="inputs" >
<table>	
<form action="$_SERVER[PHP_SELF]" method="post">
<tr><td>RFC:</td><td><input type="text" name="rfc" value="$row[rfc]"></td></tr>
<tr><td>RAZON SOCIAL:</td><td><input type="text" name="razon_social" value="$row[razon_social]"></td></tr>
<tr><td>STATUS MIGRACION:</td><td><select name="status_mig">
<option>$row[status_mig]</option>
FORMULARIO;

if(($row['status_mig']) != "Pendiente"){echo " <option> Pendiente </option> " ;}
if(($row['status_mig']) != "Migrado a CF"){echo " <option>Migrado a CF</option>" ;}
if(($row['status_mig']) != "Liberado en CF "){echo " <option>Liberado en CF </option>";}
if(($row['status_mig']) != "No puede ser migrado"){echo "<option>No puede ser migrado</option>";}

echo <<<FORMULARIO
</select></td></tr>
<tr><td>ASESOR:</td><td><select name="asesor_cf">
<option>$row[asesor_cf]</option>
FORMULARIO;

if(($row['asesor_cf']) != "Alma"){echo " <option> Alma </option> " ;}
if(($row['asesor_cf']) != "Priscilla"){echo " <option> Priscilla </option>" ;}
if(($row['asesor_cf']) != "Alberto"){echo " <option> Alberto </option>";}
if(($row['asesor_cf']) != "Jesus"){echo "<option> Jesus </option>";}

echo <<<FORMULARIO
</select></td></tr>
<tr><td>CONTACTO:</td><td><input type="text" name="contacto_admin" value="$row[contacto_admin]"></td></tr>
<tr><td>E-MAIL CONTACTO:</td><td><input type="text" name="Locemail_contactoalidad" value="$row[email_contacto]"></td></tr>
<tr><td>TEL CONTACTO:</td><td><input type="text" name="tel_contacto" value="$row[tel_contacto]"></td></tr>
<tr><td>COMENTARIOS:</td><td><input type="text" name="comentarios" value="
FORMULARIO;

if(isset($_POST['comentarios'])){echo "$_POST[comentarios]";}
else {echo "$row[comentarios]";}

echo <<<FORMULARIO
"></td></tr>
<tr><td>SERVICIO:</td><td><select name="asesor_cf">
<option>$row[servicio]</option>
FORMULARIO;

if(($row['servicio']) != "TXT"){echo " <option> TXT </option> " ;}
if(($row['servicio']) != "XML"){echo " <option> XML </option>" ;}
if(($row['servicio']) != "WS"){echo " <option> WS </option>";}
if(($row['servicio']) != "BF"){echo "<option> BF </option>";}
if(($row['servicio']) != "TF"){echo "<option> TF </option>";}

echo <<<FORMULARIO
</select></td></tr>
</table>
</div> <!--Cierra inputs -->
<br>
<input type='submit' value='Actualizar' name='submit'>
<br>
<br>
</form>

FORMULARIO;

} // "se cierra if"

if (isset($_POST['comentarios'])){
$comentarios = $_POST['comentarios'];
$update = "UPDATE cias SET comentarios = '$comentarios' WHERE rfc='$_POST[rfc]' "; 
$resultado2 = mysql_query($update) or die ("Problema con query");

if (mysql_query($update)){echo " \"Datos actualizados con exito\" ";}

}

?>

</div> <!--- Cierra cuerpo--->

<div id="pie">
<h3> Pie de pagina </h3>
</div> <!--Cierra pie -->


</body>

</html>
