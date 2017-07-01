<?php
	class abstract verficaLinkTemplate
	{
		abstract protected function verificaLink();
		abstract protected function verificaUsoDaBanda();
		
		public function verifica()
		{
			$this->verificaLink();
			$this->verificaUsoDaBanda();
		}
	}
	
	class Monitor extends verficaLinkTemplate
	{
		protected function verificaLink()
		{
			echo 'verificando link...';
		}
		
		protected function verificaUsoDaBanda()
		{
			echo 'verificando uso da banda...';
		}
		
	}
?>
