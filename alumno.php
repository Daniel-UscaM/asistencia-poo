<?php
require_once('conexion.php'); // Incluimos la conexión

class alumno
{
    public $dni, $nombre, $apellido, $genero;
    public $conexion;

    // Constructor de la clase
    public function __construct($conexion, $dni, $nombre, $apellido, $genero)
    {
        $this->conexion = $conexion;
        $this->dni = $dni;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->genero = $genero;
    }

    // Método para insertar un libro en la base de datos
    public function registraraalumno()
    {
        $sql = "INSERT INTO alumno (dni, nombre, apellido, genero) VALUES ('$this->dni', '$this->nombre', '$this->apellido', '$this->genero')";
        if (mysqli_query($this->conexion, $sql)) {
            echo "REGISTRADO CORRECTAMENTE";
            echo "<br>";
        } else {
            echo "Error al registrar el alumno: " . mysqli_error($this->conexion);
        }
    }
    public function mostraralumno(){
        $sql = "SELECT * FROM `alumno`";
        $resultado =mysqli_query($this->conexion, $sql);
        if($resultado){
            if(mysqli_num_rows($resultado) > 0){
                while($fila =mysqli_fetch_assoc($resultado)){
                    echo "DNI: " . $fila['dni'] . "<br>";
                    echo "NOMBRE: " . $fila['nombre'] . "<br>";
                    echo "APELLIDO: " . $fila['apellido'] . "<br>";
                    echo "GENERO: " . $fila['genero'] . "<br>";
                    echo "<hr>";
                }
            }else{
                echo "No hay alumnos registrados";
            }
        }else{
            echo "Error en la consulta" . mysqli_error(($this->conexion));
        }
    }
}

// Procesar el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $dni = $_POST['dni'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $genero = $_POST['genero'];

    // Crear una instancia de la clase Libro
    $alumno = new alumno($conexion, $dni, $nombre, $apellido, $genero);

    // Registrar el libro en la base de datos
    $alumno->registraraalumno();
    $alumno->mostraralumno();
}
?>