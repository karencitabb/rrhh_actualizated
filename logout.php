<?php
// 1. Reanudamos la sesión actual
session_start();

// 2. Destruimos todas las variables guardadas
session_unset();

// 3. Destruimos la sesión por completo
session_destroy();

// 4. Devolvemos al usuario a la pantalla de inicio de PlastyPetco
header("Location: index.php");
exit();
?>