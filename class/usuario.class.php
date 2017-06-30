<?php
	require_once 'class/connectDb.php';
	require_once 'class/configSystem.class.php';

	class user {
		private $user;
		private $password;
		private $instance;
		
		public function setUser($user)
		{
			$this->user = $user;
		}
		
		public function setPassword($password)
		{
			$this->password = md5($password);
		}
		
		public function login() {
			$instance = ConnectDb::getInstance();
			$db = $instance->getConnection();
			$config = new configSystem();
			
			$sql = "SELECT * FROM users WHERE login = :user AND password = :password";
			$stm = $db->prepare($sql);
			$stm->bindParam(":user", $this->user);
			$stm->bindParam(":password", $this->password);
			$stm->execute();
			
			if($stm->rowCount()>0){				
				$dados = $stm->fetch(PDO::FETCH_ASSOC);
				@session_start();
				$_SESSION['user_id'] = $dados['id'];
				$_SESSION['usuario'] = $dados['login'];
				$_SESSION['password'] = $dados['password'];
				$_SESSION['idperfil'] = $dados['idperfil'];
				$_SESSION['logado'] = $config->getKey();
				return true;
			} else {
				return false;
			}
		}
	}

?>
