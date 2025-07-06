<?php
require 'db_config.php';
$id = $_GET['id'];
$pdo->query("DELETE FROM personajes WHERE id=$id");
header("Location: index.php");
?>
