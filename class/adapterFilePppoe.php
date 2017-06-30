<?php
	require_once 'class/arquivoStrategy.php';
	require_once 'class/filePppoe.class.php';
	
	class adapterFilePppoe extends arquivoStrategy {
		private $pppoe;
		public function geraArquivo()
		{
			$pppoe = new filePppoe();
			$pppoe->genFile();
		}
	}
?>
