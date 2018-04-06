<?php 
	if (isset($_POST['entrar'])){	
		require("ldap.php");
		header("Content-Type: text/html; charset=utf-8"); 
		$usr = $_POST["usuario"]; 
		$usuario = mailboxpowerloginrd($usr,$_POST["clave"]); 
		if($usuario == "0" || $usuario == ''){ 
			$_SERVER = array(); 
			$_SESSION = array();
			?>
			<form id="local" action="local.php" method="post">
				<input type="hidden" name="usuarioLocal" value="<?php echo $_POST['usuario']; ?>" />
				<input type="hidden" name="claveLocal" value="<?php echo $_POST['clave']; ?>" />
			</form>
			<script> document.getElementById("local").submit(); </script>
			<?php
		}else{
			session_start(); 
			$_SESSION["user"] = $usuario; 
			$_SESSION["autentica"] = "SIP";
			echo "<script>window.location.href='../test2.php'; </script>"; 
		}
	}
?>