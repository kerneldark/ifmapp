<?php
	session_start();
	$logado = (isset($_SESSION['logado'])) ? $_SESSION['logado'] : '';
	$server = parse_ini_file("server.ini", true);
	$login_key = $server['INFO']['KEY'];

	if ($logado == $login_key) {
		require_once 'class/FactoryArquivo.class.php';
		
		include 'header.php';
		
		$htb = FactoryArquivo::create('htb');
		$htb->geraArquivo();
		
		$dhcpd = FactoryArquivo::create('dhcpd');
		$dhcpd->geraArquivo();
		
		$proxy = FactoryArquivo::create('proxy');
		$proxy->geraArquivo();
		
		$pppoe = FactoryArquivo::create('pppoe');
		$pppoe->geraArquivo();
		
		echo "<center><a href=principal.php>Inicio</a><br><br></center>";
		echo "<center>Alterações feitas com sucesso.</center>";
		include 'footer.php';
	}
	else {
		include 'aviso.php';
	}
?>

