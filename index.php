<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <H1>REGISTRO DE ALUMNOS</H1>
    <form action="alumno.php" method="post">
        <label for="dni">
            DNI
            <input type="number" name="dni" id="dni">
        </label><br><br>
        <label for="nombre">
            NOMBRE
            <input type="text" name="nombre" id="nombre">
        </label><br><br>
        <label for="apellido">
            APELLIDO
            <input type="text" name="apellido" id="apellido">
        </label><br><br>
        <label for="genero">
            MASCULINO
            <input type="radio" name="genero" id="genero" value="Masculino">  
        </label>
        <label for="genero">
            FEMENINO
            <input type="radio" name="genero" id="genero" value="Femenino">
        </label><br><br>
        <input type="submit" value="REGISTRAR">
        <a type="text" href="index1.php">REGISTRO DE ASISTENCIA</a>
    </form>
</body>
</html>
