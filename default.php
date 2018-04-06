<html>
<head>
    <meta charset="UTF-8">
    <title>ALEASTUR Entry Control</title>
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/css/fontawesome-all.css" rel="stylesheet">
    <link href="../assets/css/estilos.css" rel="stylesheet">
</head>
<body class="login-body">
    <div class="header"></div>    
    <div class="login-title">
        <h1>ALEASTUR Entry Control</h1>
        <hr/>
    </div>
    <div class="login-box">
        <div class="login-box-top">
            <div class="login-text">
                <h3>Inicio de sesión</h3>
                Introduce tu usuario y contraseña:
            </div>
            <div class="login-lock">
                <i class="fas fa-lock fa-4x"></i>
            </div>
        </div>
        <?php 
        if (isset($_POST['error'])){
            if ($_POST['error'] = 'error1'){
                echo "<div class='login-error'>Usuario o clave incorrectos</div>";
            } else if ($_POST['error'] = 'error2'){
                echo "<div class='login-error'>El usuario esta deshabilitado</div>";
            } else if ($_POST['error'] = 'error3'){
                echo "<div class='login-error'>Clave incorrecta</div>";
            }
        }
        ?>
        <div class="login-box-bottom">
            <form method="post" action="/login/control.php">
                <input required type="text" maxlength="50" name="usuario" id="usuario" placeholder="Usuario..." class="form-username form-control" />
                <input required type="password" maxlength="50" name="clave" id="clave" placeholder="Password..." class="form-username form-control" />
                <input type="submit" name="entrar" value="Iniciar sesión" class="btn-login btn">
            </form>
        </div>
    </div>
</body>
</html>
<?php exit(); ?>