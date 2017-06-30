<?php
	session_start();
	$logado = (isset($_SESSION['logado'])) ? $_SESSION['logado'] : '';
	$server = parse_ini_file("server.ini", true);
	$login_key = $server['INFO']['KEY'];

	if ($logado == $login_key) {
		include 'header.php';
		include 'open_db.php';
		echo "<body>
		<ul>";
		$idperfil = $_SESSION['idperfil'];
		$cmd = "select paginas.url, paginas.nome from permissoes inner join paginas on (permissoes.idpaginas = paginas.idpaginas)";
		$cmd .= " where permissoes.idperfil = '" . $idperfil. "' and permissoes.status = '1' order by paginas.ordem asc";
		$query = $db->query($cmd);
		foreach($query as $row) {
			echo "<li><a href=" . $row['url'] . ">" . $row['nome'] . "</a></li>";
		}
		echo '</ul>';
		include 'close_db.php';
		include 'footer.php';
	}

	else {
		include 'aviso.php';
	}
?>
