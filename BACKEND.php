<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'Conexion.php'; 

    $nombre = $_POST['nombre'];
    $gmail = $_POST['gmail'];

    $conexion = ConexionBD::obtenerInstancia()->obtenerConexion();

    $sql = "INSERT INTO usuarios (nombre, gmail) VALUES ('$nombre', '$gmail')";

    if ($conexion->query($sql) === TRUE) {
        // Notificar a los observadores que los datos se han almacenado correctamente
        include 'Notificador.php';
        $notificador = new Notificador();
        $notificador->notificar("Datos almacenados correctamente.");
    } else {
        echo "Error al almacenar los datos: " . $conexion->error;
    }
}
?>
