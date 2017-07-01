<?php
	require_once 'class/FactoryArquivo.class.php';
	
	class FacadeAplicar {
		public function aplicar()
		{
			$htb = FactoryArquivo::create('htb');
			$htb->geraArquivo();
			
			$dhcpd = FactoryArquivo::create('dhcpd');
			$dhcpd->geraArquivo();
			
			$proxy = FactoryArquivo::create('proxy');
			$proxy->geraArquivo();
			
			$pppoe = FactoryArquivo::create('pppoe');
			$pppoe->geraArquivo();			
		}
	}	
?>
