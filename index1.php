<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    require_once('../clases1/conexion.php');
    $sql = "SELECT id, nombre FROM alumno";
    $resultado = $conexion->query($sql);
    ?>
    <h1>REGISTRO DE ASISTENCIA DE ALUMNOS</h1>
    <form action="asistencia.php" method="post">
        <label for="nombre">
            NOMBRE:
            <select name="id_alumno" id="nombre">
                <?php
                while ($fila = $resultado->fetch_assoc()) {
                    echo '<option value="' . $fila['id'] . '">' . $fila['nombre'] . '</option>';
                }
                ?>
            </select>
        </label>
        <br><br>
    <label for="asistencia_a">
            ASISTIO
            <input type="radio" name="asistencia" id="asistencia_a" value="A">  
        </label>
        <label for="asistencia_t">
            TARDE
            <input type="radio" name="asistencia" id="asistencia_t" value="T">
        </label>
        <label for="asistencia_f">
            FALTO
            <input type="radio" name="asistencia" id="asistencia_f" valvue="F">
        </label><br><br>
        <input type="submit" value="ASISTENCIA REGISTRADA">
        <a type="text" href="index.php">REGISTRO DE ALUMNOS</a>
    </form>
</body>
</html>
