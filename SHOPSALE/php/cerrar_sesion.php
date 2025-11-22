<?php
session_start();
session_destroy(); // Destruye todas las variables de sesión
header("location: ../index.php"); // Nos manda al inicio