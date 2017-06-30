<?php	
	if ( trim($_POST['fmain']) == "" || trim($_POST['password']) == "" ) {
		include 'header-off.php';
		echo "<center>Por favor preencha usuário e senha.<br>";
		echo "<a href=index.php>Voltar</a></center>";
		include 'footer.php';
		exit;
	}
	ob_start();
	require_once 'open_db.php';
	require_once 'class/usuario.class.php';
	
	$usuario = new user();
	$usuario->setUser(trim($_POST['fmain']));
	$usuario->setPassword(trim($_POST['password']));	
	
	if ($usuario->login()) {
		header("Location: principal.php");		
	} else {
		include 'header-off.php';
		echo "<center>Usuário ou senha incorreto.<br>";
		echo "<a href=index.php>Voltar</a></center>";
		include 'footer.php';
	}
?>

