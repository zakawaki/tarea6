<?php
// Datos de conexión
$host = "localhost";
$db = "serie_db";
$user = "root";
$password = "";

try {
    // Crear conexión PDO
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Ejemplo de consulta
    $sql = "SELECT * FROM personajes"; // Asegúrate de que la tabla exista
    $resultado = $pdo->query($sql);

    // Mostrar resultados
    foreach ($resultado as $fila) {
        echo $fila['nombre'] . "<br>"; // Cambia 'nombre' por una columna real
    }

} catch (PDOException $e) {
    echo "❌ Error de conexión: " . $e->getMessage();
}
?>
