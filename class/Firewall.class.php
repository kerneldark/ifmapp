<?php
	interface FireWall {
		public function inserirUsuario($ip, $mac);
		public function removerUsuario($ip, $mac);
		public function exibirRegras();
		public function recarregar();
		public function limpar();
	}
?>
