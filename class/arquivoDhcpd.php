<?php
	require_once 'class/arquivoStrategy.php';
	
	class arquivoDhcpd extends arquivoStrategy {
		function geraArquivo() {
			echo 'gera arquivo de configuração dhcpd.conf';
		}
	}
?>
