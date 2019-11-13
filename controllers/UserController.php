<?php
	require 'models/model_user.php';
	
	class UserController { 
		protected $users;
		public function __construct($connection){
			$this->users = new Model_user($connection);

			if(!isset($_SESSION['logged'])){
				header('location:index.php?url=login&check=false');
			}
			$exp = $this->users->datdiff();
			foreach ($exp as $key) {
				# code...
				if($key->selisih >= 14){
					$arr3 = [
						'status' => 'Tutup'
					];
					$cond = [
						'id_keluhan' => $key->id_keluhan
					];
					$this->users->edited("keluhan", $arr3, $cond);
				}
			}
		}

		public function image(){
			if(empty($_FILES['file']))
		{
			echo "<script>console.log('error');</script>";
		}
			$temp = explode(".", $_FILES["file"]["name"]);
			$newfilename = round(microtime(true)) . '.' . end($temp);
			$destinationFilePath = './views/client/assets/img/keluhan/'.$newfilename ;
			if(!move_uploaded_file($_FILES['file']['tmp_name'], $destinationFilePath)){
				echo $newfilename."<script>console.log('error1');</script>";
			}
			else{
				echo $destinationFilePath. "<script>console.log('error2');</script>";
			}
		}

		public function dashboard(){
			
			$id = $_SESSION['id'];
			$showfor = $this->users->showforeignall();
			$showall = $this->users->showforeign($id);
			$show = $this->users->all("departemen");
			$ide = $this->users->max("id_keluhan", "keluhan");

			include 'views/client/assets/header.php';
			include 'views/client/dashboard.php';
			include 'views/client/assets/footer.php';
		}
 

		public function keluhan_act(){
			$id = $_GET['id'];
			$deprt = $_POST['departemen'];
			$depart = $this->users->rendem($_POST['departemen']);
			$res = [];
			foreach ($depart as $key) {
				array_push($res, $key->id_user);
			}
			$kasil = implode(",", $res);
			print_r($kasil);
				$arr = [
				'id_keluhan' => $id,
				'judul' => htmlentities($_POST['titles']),
				'deskripsi' => htmlentities($_POST['keluhan']),
				'id_departemen' => $_POST['departemen'],
				'status' => "Terbuka",
				'tanggal_upload' => date("Y-m-d H:i:s"),
				'id_user' => $_SESSION['id'],
				'terakhir_diupdate' => date("Y-m-d h:i:sa"),
				'eksekutor' => $kasil
			];
			$masuk = $this->users->insert("keluhan", $arr);
	
			$pecah = explode(",", $kasil);
			$pecahenak = [];
			foreach($pecah as $oke){
			$arren = [
				'id_keluhan' => $id,
				'from_name' => $_SESSION['nama'],
				'notifikasi' => 'Memiliki Keluhan Baru',
				'goal_user' => $oke,
				'tanggal' => date("Y-m-d H:i:s"),
				'unseen_notif' => 1
			];
			$in = $this->users->insert("notifikasi", $arren);
			}
			$sel = $this->users->max("belum_terjawab", "record where id_user=$oke");
			$upd = [
				'belum_terjawab' => $sel,
			];
			$condi = [
				'id_user' => $kasil
			];
			$ex = $this->users->edited("record", $upd, $condi);
			header('location:index.php?url=dashboard');
		}

		public function profile(){

			$id = $_GET['id'];
			$showall = $this->users->showforeign($id);
			$showprof = $this->users->selectable("user", "id_user = $id");
			$showkel = $this->users->selectable("keluhan", "id_user = $id");
			$shows = $this->users->selesai("keluhan", $id, "selesai");
			$many = count($showkel);
			$smany = count($shows);

			include 'views/client/assets/header.php';
			include 'views/client/profile.php';
			include 'views/client/assets/footer.php';
		}

		public function keluhan(){
			$id = $_GET['id'];
			$show = $this->users->showpost($id);
			if(count($show) > 0){
			$showcomm = $this->users->showpostcomment($id);
			$ide = $this->users->max("id_komentar", "komentar");

			include 'views/client/assets/header.php';
			include 'views/client/keluhan.php';
			include 'views/client/assets/footer.php';
			}else{
				header('location: index.php');
			}
		}

		public function komentar_act(){
			$id = $_GET['id'];
			$ide = $_GET['komentar'];
			if($_GET['user'] == $_SESSION['id']){
				$arr = [
				'id_komentar' => $ide,
				'komentar' => htmlentities($_POST['komentar']),
				'id_user' => $_SESSION['id'],
				'id_keluhan' => $id,
				'tanggal_komentar' => date("Y-m-d h:i:sa")
				];
				$masuk = $this->users->insert("komentar", $arr);
				$upd = [
					'terakhir_diupdate' => date("Y-m-d h:i:s")
				];
				$condition = [
					'id_keluhan' => $id
				]; 
				$update = $this->users->edited("keluhan", $upd, $condition);
				if($_GET['status'] == 'Sudah Dibalas'){
					$upd1 = [
						'status' => 'Balasan Klien'
					];
					$cond1 = [
						'id_keluhan' => $id
					];
					$notif = [
						'id_keluhan' => $id,
						'notifikasi' => 'Klien Telah Membalas Keluhan',
						'from_name' => $_SESSION['nama']
					];
				$updet = $this->users->edited("keluhan", $upd1, $cond1);
				$notif = $this->users->insert();
				}
			}else{
				$arr = [
				'id_komentar' => $ide,
				'komentar' => htmlentities($_POST['komentar']),
				'id_user' => $_SESSION['id'],
				'id_keluhan' => $id,
				'tanggal_komentar' => date("Y-m-d h:i:sa")
				];
				$masuk = $this->users->insert("komentar", $arr);
				$notify = [
					'id_keluhan' => $id,
					'notifikasi' => 'Telah Mengomentari Keluhan Anda',
					'from_name' => $_SESSION['nama'],
					'goal_user' => $_GET['user'],
					'tanggal' => date("Y-m-d h:i:s"),
					'unseen_notif' => 1
				];
				$noti = $this->users->insert("notifikasi", $notify);
			}
			header('location:index.php?url=keluhan&id='.$id);
		}

		public function kel_delete(){
			$id = $_POST['idnek'];
			$arr = [
				'id_keluhan' => $id
			];
			$select = $this->users->selectable("komentar", "id_keluhan = $id");
			if($select > 0){
				$de = $this->users->deleted("notifikasi", $arr);
				$delkom = $this->users->deleted("komentar", $arr);
				$del = $this->users->deleted("keluhan", $arr);
				
				header('location:index.php?url=dashboard');
			}else{
				$del = $this->users->deleted("keluhan", $arr);
				header('location:index.php?url=dashboard');
			}
		}

		public function kom_edit(){
			$idne = $_POST['id'];
			$datae = $this->users->selectable("komentar", "id_komentar = $idne");
			echo json_encode($datae);
		}

		public function manystats(){
			$status = $_POST['stats'];
			$datai = $this->users->selectable("keluhan", "id_user = ".$_GET['id']." and status = '$status' ");
			echo json_encode($datai);
		}

		public function kel_edit(){
			$idne = $_POST['id'];
			$datae = $this->users->selectable("keluhan", "id_keluhan = $idne");
			echo json_encode($datae);
		}

		public function komen_del(){
			$id = $_POST['idnek'];
			$back = $_POST['idkel'];
			$arr = [
				'id_komentar' => $id
			];
			$del = $this->users->deleted("komentar", $arr);
			/*$arr2 = [
				'goal_user' => $si
			];
			print_r($arr2);
			$del2 = $this->users->deleted("notifikasi", $arr2);*/
			header('location:index.php?url=keluhan&id='.$back);
		}

		public function kel_edit_act(){
			$title = $_POST['judul'];
			$desk = $_POST['editKeluhan'];
			$id = $_POST['id'];
			$condition = [
				"id_keluhan" => $id
			];
			$arr = [
				"judul" => $title,
				"deskripsi" => $desk
			];
			$edit = $this->users->edited("keluhan", $arr, $condition);
			header('location:index.php?url=keluhan&id='. $id);
		}

		public function kom_edit_act(){
			$desk = $_POST['editKeluhan'];
			$id = $_POST['id'];
			$idkel = $_POST['idkel'];
			$condition = [
				"id_komentar" => $id
			];
			$arr = [
				"komentar" => $desk
			];
			$edit = $this->users->edited("komentar", $arr, $condition);
			header('location:index.php?url=keluhan&id='. $idkel);
		}

		public function profiles_edit(){
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

			$edit = $this->users->edited("user", $arr, $condition);
			$_SESSION['nama'] = $_POST['name'];
			header('location: index.php?url=profile&id='.$_POST['idnea']);
			}
		}

		public function error(){
			include 'views/client/error.php';
		}

		public function notifyne(){
			$notie = $this->users->notife();
			$sup = $_SESSION['id'];
			if($_POST['view'] != ''){

                    $arre = [
                    	'unseen_notif' => 0
                    ];
                    $conditioner = [
                    	'goal_user' => $sup,
                    ];
                    $query1 = $this->users->edited("notifikasi", $arre, $conditioner);
                    //echo "<script>console.log('mantap')</script>".$sup;
                }
			$isi = '';
                if(count($notie) > 0){
                	foreach ($notie as $key) {
                		# code...
                        $isi .='
                            <a href="index.php?url=keluhan&id='.$key->id_keluhan.'" class="media p-3 del">
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
                $ngitung = count($this->users->selectable("notifikasi", "goal_user = '$sup' and unseen_notif = 1 "));
                $datane = array(
                    'daleman' => $isi,
                    'koun' => $ngitung
                );

                echo json_encode($datane);
		}

			public function rateclose(){
				$idkel = $_POST['idnek'];
				$upd = [
					'status' => 'Tutup'
				];
				$cond = [
					'id_keluhan' => $idkel
				];
				$update = $this->users->edited("keluhan", $upd, $cond);
				header('location: index.php?url=dashboard');
			}

	}
?>