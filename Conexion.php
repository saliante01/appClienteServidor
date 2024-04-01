<?php
class ConexionBD {
    // Instancia única de la conexión
    private static $instancia;
    private $conexion;

    // Constructor privado para evitar la creación de instancias fuera de la clase
    private function __construct() {
        $this->conexion = new mysqli("localhost", "root", "", "testDataBase");

        if ($this->conexion->connect_error) {
            die("Error de conexión: " . $this->conexion->connect_error);
        }
    }

    // Método estático para obtener la instancia única de la conexión
    public static function obtenerInstancia() {
        // Si la instancia aún no ha sido creada, se crea una nueva
        if (self::$instancia === null) {
            self::$instancia = new ConexionBD();
        }
        // Devuelve la instancia única
        return self::$instancia;
    }

    // Método para obtener la conexión
    public function obtenerConexion() {
        return $this->conexion;
    }

    // Evita que la instancia pueda ser clonada
    private function __clone() {}

    // Evita que la instancia pueda ser deserializada
    private function __wakeup() {}
}

// Uso del Singleton para obtener la conexión a la base de datos
$conexion = ConexionBD::obtenerInstancia();
?>
