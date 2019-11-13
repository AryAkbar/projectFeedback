<?php
	require ('models/model_auth.php');

	class AuthController{
		protected $auth;
		function __construct($connection){
			$this->auth = new Model_auth($connection);
		}

		public function login(){
			include 'views/client/login.php';
		}

		public function checklogin(){
			$username = $_POST['username'];
			$pass = md5($_POST['password']);
			$check = $this->auth->login($username, $pass);
			if(count($check) < 0){
				header('location:index.php?login&username=wrong');
			}
			echo "password atau username salah <br/> <a onclick='window.history.back'>back</a>";
		}

		public function logout(){
			$_SESSION['gbr'] = "";
			session_destroy();
			header('location: index.php?url=login&status=logout');
		}
	}
?>