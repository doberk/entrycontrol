<?php
session_start();
if((!isset($_SESSION["autentica"])) || ($_SESSION["autentica"] != "SIP")){
	session_destroy();
    header("Location: /");
    exit();
}
?>
<html>
<head>
    <meta charset="UTF-8">
    <title>ALEASTUR Entry Control</title>
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/css/fontawesome-all.css" rel="stylesheet">
    <link href="../assets/css/estilos.css" rel="stylesheet">
</head>
<body>
    <div class="header">
        <div class="brand">ALEASTUR Entry Control</div>
        <div class="header-right"><a href="../login/salir.php"><div class="logout"><i class="fas fa-sign-out-alt"></i>&nbsp;Cerrar sesión</div></a></div>
        <div class="header-right">¡Hola, <?php echo $_SESSION["user"]; ?>!</div>
    </div>
</body>
</html>
