<?php
header("Access-Control-Allow-Origin: *");

$host = 'localhost'; // Host de la base de datos (puede ser diferente)
$usuario = 'root'; // Usuario de la base de datos
$contrasena = ''; // Contraseña de la base de datos
$base_de_datos = 'personal'; // Nombre de la base de datos
$tabla = 'dianah'; // Nombre de la tabla

// Conexión a la base de datos
$conexion = new mysqli($host, $usuario, $contrasena, $base_de_datos);

// Verificar la conexión
if ($conexion->connect_error) {
    die("Error de conexión a la base de datos: " . $conexion->connect_error);
}

if (isset($_GET['dni']))
    {
      //Mostrar un reg. de abono especifica
      $sql = $cnx->prepare("SELECT nombre FROM dianah WHERE dni = :dni");
      $sql->bindValue(':dni', $_GET['dni']);
      $sql->execute();
      header("HTTP/1.1 200 OK");
      echo json_encode($sql->fetch(PDO::FETCH_ASSOC));
      exit();
    }
?>
