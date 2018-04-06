<?php
echo "hola mundo<br/>";
session_start();
echo $_SESSION["prueba"];
session_destroy();
?>