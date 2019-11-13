<?php
	class Model_auth{
		protected $connection;
		function __construct($connection){
			$this->connection = $connection;
		}

		public function login($uname, $pwd){
			$enc = htmlentities($uname);
			$dec = html_entity_decode($enc);
			$sql = "SELECT * FROM user where password='$pwd' and username='$dec'";
			$exec = $this->connection->query($sql);
			$row = $exec->num_rows;
			$data = $exec->fetch_assoc();
			if($data['position'] == "Anggota"){
			if($row == 1){
				$_SESSION['logged'] = "logged";
				$_SESSION['username'] = $data['username'];
				$_SESSION['position'] = $data['position'];
				$_SESSION['id'] = $data['id_user'];
				$_SESSION['nama'] = $data['name'];
				$_SESSION['gbr'] = $data['imgdir'];
				header('location: index.php?url=dashboard');
			}else{
				$_SESSION['uname'] 	= "";
				$_SESSION['role'] 	= "";
				header('location:index.php?login&username=wrong');
			}
		}else if($data['position'] == "Admin"){
			if($row == 1){
				$_SESSION['logged'] = "logged";
				$_SESSION['username'] = $data['username'];
				$_SESSION['position'] = $data['position'];
				$_SESSION['id'] = $data['id_user'];
				$_SESSION['nama'] = $data['name'];
				$_SESSION['gbr'] = $data['imgdir'];
				$_SESSION['role'] = $data['role'];
				header('location: index.php?url=admin/dashboard');
			}else{
				$_SESSION['logged'] = "";
				$_SESSION['uname'] 	= "";
				$_SESSION['role'] 	= "";
				header('location:index.php?login&username=wrong');
			}
		}
		}
	}
?>