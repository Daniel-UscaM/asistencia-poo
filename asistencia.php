<?php
require_once('conexion.php'); // Incluimos la conexión

class asistencia
{
    public $id_alumno, $asistencia;
    public $conexion;

    // Constructor de la clase
    public function __construct($conexion, $id_alumno, $asistencia)
    {
        $this->conexion = $conexion;
        $this->id_alumno = $id_alumno;
        $this->asistencia = $asistencia;
    }

    // Método para insertar un libro en la base de datos
    public function registrarasistencia()
    {
        $sql = "INSERT INTO asistencia (id_alumno, asistencia) VALUES ('$this->id_alumno', '$this->asistencia')";
        if (mysqli_query($this->conexion, $sql)) {
            echo "asistencia registrado correctamente";
        } else {
            echo "Error al registrar asistencia: " . mysqli_error($this->conexion);
        }
    }
    public function mostrarasistencia() {
        // Consulta para obtener el nombre, apellido y asistencia
        $sql = "
            SELECT a.nombre, a.apellido, asis.asistencia 
            FROM asistencia as asis
            JOIN alumno as a ON asis.id_alumno = a.id
        ";
    
        $resultado = mysqli_query($this->conexion, $sql);
    
        if ($resultado) {
            // Mostrar resultados
            while ($row = mysqli_fetch_assoc($resultado)) {
                echo "Nombre: " . $row['nombre'] . " " . $row['apellido'] . "<br>";
                echo "Registro: " . $row['asistencia'] . "<hr>";
            }
        } else {
            // Muestra el error de SQL
            echo "Error al obtener asistencias: " . mysqli_error($this->conexion);
        }
    }
}

// Procesar el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_alumno = $_POST['id_alumno'];
    $asistencia = $_POST['asistencia'];

    // Crear una instancia de la clase Libro
    $asistencia = new asistencia($conexion, $id_alumno, $asistencia);

    // Registrar el libro en la base de datos
    $asistencia->registrarasistencia();
    $asistencia->mostrarasistencia();
}
?>