<?php
$dp = @mysql_connect("localhost", "root", "") or die("<p>No se ha podido establecer la conexi�n con MySQL.</p>");
@mysql_select_db("sql_profi", $dp) or die("<p>Conexi�n con la base de datos no establecida.</p>");
?>
