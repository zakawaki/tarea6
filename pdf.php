<?php
require 'db_config.php';
require 'vendor/autoload.php';

use Dompdf\Dompdf;

$id = $_GET['id'];

// Obtener los datos del personaje
$p = $pdo->query("SELECT * FROM personajes WHERE id=$id")->fetch();

// Construir la ruta absoluta a la imagen del personaje
$foto_relativa = $p['../imagenes/levi.png']; // Por ejemplo: 'imagenes/levi.png'
$foto_absoluta = 'file://' . realpath(__DIR__ . '/' . $foto_relativa);

// Comprobar si la ruta es válida (opcional para debug)
if (!file_exists(__DIR__ . '/' . $foto_relativa)) {
    die("❌ Imagen no encontrada: {$foto_relativa}");
}

// Cargar el CSS desde un archivo externo
$css = file_get_contents(__DIR__ . '/css/pdf.css');

// Generar el HTML
$html = "
<style>
$css
</style>

<div class='card'>
    <img src='https://i.imgur.com/SvZBI8y.png' width='60'><br><br>
    <h1>{$p['nombre']}</h1>
    <img src='{$foto_absoluta}'><br><br>
    <div class='atributo'><strong>Color:</strong> {$p['color']}</div>
    <div class='atributo'><strong>Tipo:</strong> {$p['tipo']}</div>
    <div class='atributo'><strong>Nivel:</strong> {$p['nivel']}</div>
    <div class='footer'>Universo: Attack on Titan</div>
</div>
";

// Crear el PDF
$dompdf = new Dompdf(['enable_remote' => true]);
$dompdf->loadHtml($html);
$dompdf->setPaper('A5', 'portrait');
$dompdf->render();

// Forzar descarga del PDF
$dompdf->stream("personaje_{$p['nombre']}.pdf", ["Attachment" => true]);
?>
