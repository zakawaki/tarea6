<?php
require 'db_config.php';

$id = $_GET['id'];
$personaje = $pdo->query("SELECT * FROM personajes WHERE id=$id")->fetch();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $color = $_POST['color'];
    $tipo = $_POST['tipo'];
    $nivel = $_POST['nivel'];

    $foto = $personaje['foto'];
    if ($_FILES['foto']['name']) {
        $foto = "imagenes/" . basename($_FILES["foto"]["name"]);
        move_uploaded_file($_FILES["foto"]["tmp_name"], $foto);
    }

    $sql = "UPDATE personajes SET nombre=?, color=?, tipo=?, nivel=?, foto=? WHERE id=?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$nombre, $color, $tipo, $nivel, $foto, $id]);

    header("Location: index.php");
}
?>

<form method="POST" enctype="multipart/form-data">
    Nombre: <input type="text" name="nombre" value="<?= $personaje['nombre'] ?>"><br>
    Color: <input type="text" name="color" value="<?= $personaje['color'] ?>"><br>
    Tipo: <input type="text" name="tipo" value="<?= $personaje['tipo'] ?>"><br>
    Nivel: <input type="number" name="nivel" value="<?= $personaje['nivel'] ?>"><br>
    Foto actual: <img src="<?= $personaje['foto'] ?>" width="80"><br>
    Nueva foto: <input type="file" name="foto"><br>
    <input type="submit" value="Actualizar Personaje">
</form>
<head>

<link rel="stylesheet" href="../css/editar.css">
<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
<a href="acerca.php">Acerca de</a>
</head>