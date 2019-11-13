<?php
	require 'models/model_admin.php';
	
	class AdminController {
		protected $usera;
		public function __construct($connection){
			$this->usera = new Model_admin($connection);
			if(!isset($_SESSION['logged'])){
				header('location:index.php?url=login&&check=false');
			}
		}

		public function report_data(){
			
		}

		public function shoing(){
			$idkan = $_POST['id'];
			$data = $this->usera->allable("user", "id_user = $idkan");
			echo json_encode($data);
		}

		public function shobles(){
			$stajud = $_POST['stats'];
			$data = $this->usera->allable("keluhan", "status = $stajud");
			echo json_encode($data);
		}

		public function dashboard(){
			
			$showfor = $this->usera->showallfor();
			//$showno = $this->usera->allwhere();
			$show = $this->usera->whereall($_SESSION['id']);
			$sho = $this->usera->wherealls();

			include 'views/admin/assets/header.php';
			include 'views/admin/assets/sidebar.php';
			include 'views/admin/dashboard.php';
			include 'views/admin/assets/footer.php';
		}

		public function profil(){

			$id = $_GET['id'];
			$showprof = $this->usera->selectable("user", "id_user = $id");

			include 'views/admin/assets/header.php';
			include 'views/admin/assets/sidebar.php';
			include 'views/admin/profile.php';
			include 'views/admin/assets/footer.php';
		}
		public function profil_edit(){
			if(!empty($_FILES['uploed']['name'])){
				$imgne = $_FILES['uploed']['name'];
				$locimg = $_FILES['uploed']['tmp_name'];
				$dir = 'views/client/assets/img/users/'.$imgne;
				if(!empty($imgne)){
					move_uploaded_file($locimg, $dir);
					$arr = [
						'name' => $_POST['name'],
						'tgl_lahir' => $_POST['tgl'],
						'jk' => $_POST['d'],
						'alamat' => $_POST['alamat'],
						'phone' => $_POST['nohp'],
						'biografi' => htmlentities($_POST['biografi']),
						'email' => $_POST['email'],
						'imgdir' => $imgne
					];

					$condition = [
						'id_user' => $_SESSION['id']
					];
					$edit = $this->users->edited("user", $arr, $condition);
					$_SESSION['gbr'] = $imgne;
					$_SESSION['nama'] = $_POST['name'];
					header('location: index.php?url=profile&id='.$_POST['idnea']);
				}
		}else{
			$gbre = $_POST['gbr'];
			$arr = [
				'name' => $_POST['name'],
				'tgl_lahir' => $_POST['tgl'],
				'jk' => $_POST['d'],
				'alamat' => $_POST['alamat'],
				'phone' => $_POST['nohp'],
				'biografi' => htmlentities($_POST['biografi']),
				'email' => $_POST['email'],
				'imgdir' => $gbre
			];

			$condition = [
				'id_user' => $_SESSION['id']
			];

			$edit = $this->usera->edited("user", $arr, $condition);
			$_SESSION['nama'] = $_POST['name'];
			header('location: index.php?url=profile&id='.$_POST['idnea']);
			}
		}

		public function search(){
			$hasil = $_POST['vale'];
			$all = $this->usera->allable("user", "name LIKE '%$hasil%'");
			echo json_encode($all);
		}

		public function datanggota(){
			
			$all = $this->usera->all("user");
			$max = $this->usera->max("id_user", "user");

			include 'views/admin/assets/header.php';
			include 'views/admin/assets/sidebar.php';
			include 'views/admin/datanggota.php';
			include 'views/admin/assets/footer.php';
		}

		public function komentar_act_insert(){
			$id = $_GET['id'];
			$ide = $_GET['komentar'];
			$gole = $_GET['goal'];
			$encode = htmlentities($_POST['komentar']);
			$arr = [
				'id_komentar' => $ide,
				'komentar' => $encode,
				'id_user' => $_SESSION['id'],
				'id_keluhan' => $id,
				'tanggal_komentar' => date("Y-m-d H:i:s")
			];
			$masuk = $this->usera->insert("komentar", $arr);
			$masok = [
				'id_keluhan' => $id,
				'notifikasi' => 'Telah Membalas Keluhan Anda',
				'from_name' => $_SESSION['nama'],
				'goal_user' => $gole,
				'tanggal' => date("Y-m-d H:i:s"),
				'unseen_notif' => 1
			];			
			$notin = $this->usera->insert("notifikasi", $masok);
			$upd = [
				'status' => 'Sudah Dibalas'
			];
			$cond = [
				'id_keluhan' => $id
			];
			$kel = $this->usera->update("keluhan", $upd, $cond);
			header('location:index.php?url=admin/keluhan&id='.$id);
		}

		public function user_act_insert(){
			$id = $_GET['id'];
			$arr = [
				'id_user' => $id,
				'name' => $_POST['name'],
				'tgl_lahir' => $_POST['tgl'],
				'jk' => $_POST['d'],
				'alamat' => $_POST['alamat'],
				'phone' => $_POST['no'],
				'biografi' => htmlentities($_POST['bio']),
				'username' => $_POST['usern'],
				'password' => md5($_POST['pass']),
				'email' => $_POST['email'],
				'position' => $_POST['position'],
				'role'=> $_POST['role'],
				'imgdir' => 'no-image.png'
			];
			$tambah = $this->usera->insert("user", $arr);
			header('location:index.php?url=admin/datanggota');
		}

		public function user_edit_act(){
			$arr = [
				'name' => $_POST['name'],
				'tgl_lahir' => $_POST['tgl'],
				'jk' => $_POST['d'],
				'alamat' => $_POST['alamat'],
				'phone' => $_POST['no'],
				'biografi' => $_POST['bio'],
				'username' => $_POST['usern'],
				'email' => $_POST['email'],
				'position' => $_POST['position']
			];
			$condition = [
				'id_user' => $_POST['idneu']
			];

			$edit = $this->usera->update("user", $arr, $condition);
			header('location:index.php?url=admin/datanggota');
		}

		public function user_delete_act(){
			$arr = [
				'id_user' => $_POST['idhp']
			];
			$delete = $this->usera->delete("user", $arr);
			$delet = $this->usera->delete("keluhan", $arr);
			$del = $this->usera->delete("komentar", $arr);
			header('location:index.php?url=admin/datanggota');
		}

		public function kindepart(){
			
			$show = $this->usera->all("departemen");

			include 'views/admin/assets/header.php';
			include 'views/admin/assets/sidebar.php';
			include 'views/admin/kindepart.php';
			include 'views/admin/assets/footer.php';
		}

		public function kindepartu(){
			$ro = $_SESSION['role'];
			
			$show = $this->usera->kindeartu($ro);

			include 'views/admin/assets/header.php';
			include 'views/admin/assets/sidebar.php';
			include 'views/admin/kindepartu.php';
			include 'views/admin/assets/footer.php';
		}
		public function keluhan(){
			
			$postingan = $this->usera->showpost($_GET['id']);
			$komen = $this->usera->showpostcomment($_GET['id']);
			$ide = $this->usera->max("id_komentar", "komentar");

			include 'views/admin/assets/header.php';
			include 'views/admin/assets/sidebar.php';
			include 'views/admin/keluhan.php';
			include 'views/admin/assets/footer.php';
		}

		public function notifmin(){
			$notie = $this->usera->notife();
			$sup = $_SESSION['id'];
			if($_POST['view'] != ''){

                    $arre = [
                    	'unseen_notif' => 0
                    ];
                    $conditioner = [
                    	'goal_user' => $sup,
                    ];
                    $query1 = $this->usera->update("notifikasi", $arre, $conditioner);
                    //echo "<script>console.log('mantap')</script>".$sup;
                }
			$isi = '';
                if(count($notie) > 0){
                	foreach ($notie as $key) {
                		# code...
                        $isi .='
                            <a href="index.php?url=admin/keluhan&id='.$key->id_keluhan.'" class="media p-3 del">
                                <div class="media-body">
                                    <div class="media-heading">'.$key->from_name.'<small class="text-muted float-right">'.$key->tanggal.'</small></div>
                                    <div class="font-13 text-muted">'.$key->notifikasi.'.</div>
                                </div>
                            </a>
                        ';
                    }
                }else{
                    $isi ='<div class="media p-3">
                                <div class="media-body">
                                    <div class="font-13 text-muted">Belum Ada Notifikasi</div>
                                </div>
                            </div>';
                }
                $ngitung = count($this->usera->allable("notifikasi", "goal_user = '$sup' and unseen_notif = 1 "));
                $datane = array(
                    'daleman' => $isi,
                    'koun' => $ngitung
                );

                echo json_encode($datane);
		}

	}
?>