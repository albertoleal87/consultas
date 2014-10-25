<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
<title>Cargar un archivo</title>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1">
</head>
<body>
<h1>Mi álbum de fotos en línea</h1>
<h3>Cargar archivo</h3>
<form action='<?php echo $_SERVER['PHP_SELF'] ?>' method="post" 
enctype="multipart/form-data">
<input type="file" name="archivo">
<input type="submit" name='submit' value="Cargar archivo">
</form>
<?php
$ruta = "img/"; // Indicar ruta

if (isset($_FILES['archivo']) && $_FILES['archivo']['size'] > 0) {
    $anchomax = 600; // Breite in Pixel angeben
    $nombretemp = $_FILES['archivo']['tmp_name'];
    $nombrearchivo = $_FILES['archivo']['name'];
    $tamanyoarchivo = $_FILES['archivo']['size'];
    $tipoarchivo = GetImageSize($nombretemp);

    if ($tipoarchivo[2] == 1 || $tipoarchivo[2] == 2) { // GIF o JPG?
        if ($tipoarchivo[0] <= $anchomax) { // Archivo demasiado ancho?
            if (move_uploaded_file($nombretemp, $ruta . $nombrearchivo)) {
                echo "<p>El archivo se ha cargado <b>con éxito</b>.
                Tamaño de archivo: <b>$tamanyoarchivo</b> bytes,
                Anchura: <b>$tipoarchivo[0]</b>
                Nombre de imagen: <b>$nombrearchivo</b><br></p>";
            } else {
                echo "<p>No se ha podido cargar el archivo.</p>";
            } 
        } else {
            echo "<p>El archivo tiene una anchura superior a <b>$anchomax píxeles</b> y 
            es demasiado ancho.</p>";
        } 
    } else {
        echo "<p>No es un archivo GIF 
        o JPG válido.</p>";
    } 
    echo "<form action='{$_SERVER['PHP_SELF']}' method='post'>
          <input type='submit' value='OK'></form>";
} 
$filehandle = opendir($ruta); // Abrir archivos
while ($file = readdir($filehandle)) {
    if ($file != "." && $file != "..") {
        $tamanyo = GetImageSize($ruta . $file);
        echo "<p><img src='$ruta$file' $tamanyo[3]><br></p>\n";
    } 
} 
closedir($filehandle); // Fin lectura archivos
?>
</body>
</html>