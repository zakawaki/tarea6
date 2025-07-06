<?php
require 'db_config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $color = $_POST['color'];
    $tipo = $_POST['tipo'];
    $nivel = $_POST['nivel'];

    // Guardar imagen
    $foto = '';
    if (!empty($_FILES['foto']['name'])) {
        $target_dir = "imagenes/";
        $foto = $target_dir . basename($_FILES["foto"]["name"]);
        move_uploaded_file($_FILES["foto"]["tmp_name"], $foto);
    }

    // Guardar en BD
    $sql = "INSERT INTO personajes (nombre, color, tipo, nivel, foto) VALUES (?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$nombre, $color, $tipo, $nivel, $foto]);

    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar Personaje</title>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/agregar.css"> <!-- Asegúrate de que la ruta sea correcta -->
</head>
<body>

<!-- Botón para volver o ir al Acerca de -->
<div style="margin: 20px;">
    <a href="index.php" class="btn btn-secondary">⬅ Volver</a> |
    <a href="acerca.php" class="btn btn-info">📘 Acerca de</a>
</div>

<!-- Formulario -->
<div class="form-container">
    <h2>Agregar Nuevo Personaje</h2>
    <form method="POST" enctype="multipart/form-data">
        <label>Nombre:</label>
        <input type="text" name="nombre" required><br>

        <label>Color:</label>
        <input type="text" name="color" required><br>

        <label>Tipo:</label>
        <input type="text" name="tipo" required><br>

        <label>Nivel:</label>
        <input type="number" name="nivel" required><br>

        <label>Foto:</label>
        <input type="file" name="foto" accept="image/*"><br><br>

        <input type="submit" value="Agregar Personaje">
    </form>
</div>

</body>
</html>
