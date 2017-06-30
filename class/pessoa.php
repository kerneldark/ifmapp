<?php
	class Pessoa {
		private $nome;
		private $endereco;
		private $bairro;
		private $cidade;
		private $estado;
		private $tipo;
		private $situacao;
		
		public void setNome($nome) {
			$this->$nome = $nome;
		}
		
		public abstract salva();
		public abstract remove();
		public abstract altera();
		public abstract selectAll();
	}

?>