<?php
require 'db_config.php';
$personajes = $pdo->query("SELECT * FROM personajes")->fetchAll();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Personajes - Attack on Titan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/cssindex.css">
    
</head>
<body>

<!-- 🧭 Menú de Navegación -->
<nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">🛡️ AoT Personajes</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav me-auto">
                <li class="nav-item"><a class="nav-link text-light" href="index.php">Inicio</a></li>
                <li class="nav-item"><a class="nav-link text-light" href="agregar.php">Agregar Personaje</a></li>
                <li class="nav-item"><a class="nav-link text-light" href="acerca.php">Acerca de</a></li> <!-- ✅ AQUÍ -->
            </ul>
        </div>
    </div>
</nav>


<!-- 💾 Lista de Personajes -->
<div class="container mt-4">
    <div class="bg-card">
        <h2 class="text-center mb-4">Lista de Personajes</h2>
        <a href="agregar.php" class="btn btn-custom mb-3">+ Agregar Personaje</a>

        <table class="table table-dark table-hover table-bordered">
            <thead class="table-success">
                <tr>
                    <th>Foto</th>
                    <th>Nombre</th>
                    <th>Color</th>
                    <th>Tipo</th>
                    <th>Nivel</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($personajes as $p): ?>
                    <tr>
                        <td><img src="<?= $p['foto'] ?>"></td>
                        <td><?= htmlspecialchars($p['nombre']) ?></td>
                        <td><?= htmlspecialchars($p['color']) ?></td>
                        <td><?= htmlspecialchars($p['tipo']) ?></td>
                        <td><?= htmlspecialchars($p['nivel']) ?></td>
                        <td>
                            <a href="editar.php?id=<?= $p['id'] ?>" class="btn btn-warning btn-sm">✏️ Editar</a>
                            <a href="eliminar.php?id=<?= $p['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar este personaje?')">🗑️ Eliminar</a>
                            <a href="pdf.php?id=<?= $p['id'] ?>" class="btn btn-info btn-sm">📄 PDF</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>



</body>
</html>
