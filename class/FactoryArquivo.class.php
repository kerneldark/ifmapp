<?php
	require_once 'class/arquivoHtb.php';
	require_once 'class/arquivoDhcpd.php';
	require_once 'class/arquivoProxy.php';
	require_once 'class/adapterFilePppoe.php';
	
	class FactoryArquivo {
		private $obj = null;
		public static function create($tipo)
		{
			switch($tipo) {
			case 'htb':
				$obj = new arquivoHtb();	
				break;
			case 'dhcpd':
				$obj = new arquivoDhcpd();
				break;
			case 'proxy':
				$obj = new arquivoProxy();
				break;
			case 'pppoe':
				$obj = new adapterFilePppoe();
				break;
			}
			return $obj;
		}		
	}
?>
