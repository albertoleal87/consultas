<?php
$dp = @mysql_connect("localhost", "root", "") or die("<p>No se ha podido establecer la conexión con MySQL.</p>");
@mysql_select_db("sql_profi", $dp) or die("<p>Conexión con la base de datos no establecida.</p>");
?>
