<?php
session_start();
session_destroy();
header("Location: index.php"); // Redirige a la página principal
exit;
?>