<?php
	session_start();
	$logado = (isset($_SESSION['logado'])) ? $_SESSION['logado'] : '';
	$server = parse_ini_file("server.ini", true);
	$login_key = $server['INFO']['KEY'];

	if ($logado == $login_key) {
		header("location: principal.php");
	}
	else {
		include 'header-off.php';	
		echo "
		<br>
		<br>
		<br>
		<body onload=setFocus()>
		";
		echo $msg;
		echo "
		<br>
		<center>
		<form action=login.php method=POST name=form onsubmit=checkForm(this); >
		Usuário: <br> <input name=fmain type=text style='width:160px;' maxlength=32 /><br>
		Senha: <br> <input name=password type=password style='width:160px;' maxlength=32 /><br><br>
		<input name=enviar type=submit name=enviar value=Entrar>
		<br>
		<br>
		</center>
		";
		include 'footer.php';
	}
?>

