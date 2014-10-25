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

Actualiza Datos.


<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
RFC: <input type="text" name="rfc" />
<input type="submit" name="Buscar" value="Buscar"/> 
</form>

<?php

if (isset($_POST['rfc'])) 
{
$rfc = $_POST['rfc'];

$dp = mysql_connect("localhost", "root", "");
mysql_select_db("corporativos", $dp);
$sql = " SELECT * FROM `cias` WHERE rfc='$rfc' ";
$resultado = mysql_query($sql);
$row = mysql_fetch_assoc($resultado);
$comentarios = $row['comentarios'];


echo <<<FORMULARIO
<form action="Actualizar.php" method="POST">
<div id="inputs" >
<table>	
<tr><td>razon_social:</td><td><input type="text" name="rfc" value="$row[rfc]"></td></tr>
<tr><td>razon_social:</td><td><input type="text" name="razon_social" value="$row[razon_social]"></td></tr>
<tr><td>status_mig:</td><td><select name="status_mig">
<option>$row[status_mig]</option>
FORMULARIO;

if(($row['status_mig']) != "Pendiente"){echo " <option> Pendiente </option> " ;}
if(($row['status_mig']) != "Migrado a CF"){echo " <option>Migrado a CF</option>" ;}
if(($row['status_mig']) != "Liberado en CF "){echo " <option>Liberado en CF </option>";}
if(($row['status_mig']) != "No puede ser migrado"){echo "<option>No puede ser migrado</option>";}

echo <<<FORMULARIO
</select></td></tr>
<tr><td>asesor_cf:</td><td><select name="asesor_cf">
<option>$row[asesor_cf]</option>
FORMULARIO;

if(($row['asesor_cf']) != "Alma"){echo " <option> Alma </option> " ;}
if(($row['asesor_cf']) != "Priscilla"){echo " <option> Priscilla </option>" ;}
if(($row['asesor_cf']) != "Alberto"){echo " <option> Alberto </option>";}
if(($row['asesor_cf']) != "Jesus"){echo "<option> Jesus </option>";}

echo <<<FORMULARIO
</select></td></tr>
<tr><td>contacto_admin:</td><td><input type="text" name="contacto_admin" value="$row[contacto_admin]"></td></tr>
<tr><td>email_contacto:</td><td><input type="text" name="Locemail_contactoalidad" value="$row[email_contacto]"></td></tr>
<tr><td>tel_contacto:</td><td><input type="text" name="tel_contacto" value="$row[tel_contacto]"></td></tr>
<tr><td>comentarios:</td><td><input type="text" name="comentarios" value="$comentarios"></td></tr>
<tr><td>servicio:</td><td><input type="text" name="servicio" value="$row[servicio]"></td></tr>	
</table>
</div>
<input type='submit' value='Actualizar' name='submit' ">
FORMULARIO;

} // "se cierra if"

if (isset($_POST['comentarios'])){
$comentarios = $_POST['comentarios'];
$update = "UPDATE cias SET comentarios = '$comentarios' WHERE rfc='$rfc' "; 
$resultado2 = mysql_query($update) or die ("Problema con query");
if (mysql_query($update)){echo " Actualizacion satisfactoria";}
}

echo"</form>";

?>






</div>

<div id="pie">
<h3>

Pie de pagina

</h3>
</div>


</body>

</html>
