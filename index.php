<?php
date_default_timezone_set("Asia/Jakarta");
ob_start();
session_start();
require ('config/db.php');
$get_url = @$_GET['url']; //mendapatakan url dari index.php?url=...

switch ($get_url) {

	case 'dashboard':
		require 'controllers/UserController.php';
		$class = new UserController($mysqli);
		$class->dashboard();
	break;

	case 'many':
		# code...
		require 'controllers/UserController.php';
		$class = new UserController($mysqli);
		$class->manystats();
		break;

	case 'keluhan/image':
		# code...
		require 'controllers/UserController.php';
		$class = new UserController ($mysqli);
		$class->image();
		break;

	case 'admin/print':
		require 'controllers/AdminController.php';
		$class = new AdminController($mysqli);
		$class->report_data();
		break;

	case 'keluhan/action':
		# code...
		require 'controllers/UserController.php';
		$class = new UserController($mysqli);
		$class->keluhan_act();
		break;

	case 'keluhan/delete/act':
		# code...
		require 'controllers/UserController.php';
		$class = new UserController($mysqli);
		$class->kel_delete();
		break;

	case 'login':
		require 'controllers/AuthController.php';
		$class = new AuthController($mysqli);
		$class->login();
	break;

	case 'checklogin':
		require 'controllers/AuthController.php';
		$class = new AuthController($mysqli);
		$class->checklogin();
	break;

	case 'profile':
		require 'controllers/UserController.php';
		$class = new UserController($mysqli);
		$class->profile();
	break;

	case 'profil':
	require 'controllers/AdminController.php';
	$class = new AdminController($mysqli);
	$class->profil();
	break;

	case 'profil/edit':
	require 'controllers/AdminController.php';
	$class = new AdminController($mysqli);
	$class->profil_edit();
	break;

	case 'profile/edit':
		# code...
		require 'controllers/UserController.php';
		$class = new UserController($mysqli);
		$class->profiles_edit();
		break;

	case 'keluhan':
		require 'controllers/UserController.php';
		$class = new UserController($mysqli);
		$class->keluhan();
	break;

	case 'notif':
		require 'controllers/UserController.php';
		$class = new UserController($mysqli);
		$class->notifyne();
	break;

	case 'komentar/action':
		# code...
		require 'controllers/UserController.php';
		$class = new UserController($mysqli);
		$class->komentar_act();
		break;

	case 'komentar/delete/act':
		# code...
		require 'controllers/UserController.php';
		$class = new UserController($mysqli);
		$class->komen_del();
		break;

	case 'komentar/edit':
		# code...
		require 'controllers/UserController.php';
		$class = new UserController($mysqli);
		$class->kom_edit();
		break;

	case 'komentar/edit/act':
		# code...
		require 'controllers/UserController.php';
		$class = new UserController($mysqli);
		$class->kom_edit_act();
		break;

	case 'keluhan/edit':
		# code...
		require 'controllers/UserController.php';
		$class = new UserController($mysqli);
		$class->kel_edit();
		break;

	case 'keluhan/edit/act':
		# code...
		require 'controllers/UserController.php';
		$class = new UserController($mysqli);
		$class->kel_edit_act();
		break;

	case 'logout':
		require 'controllers/AuthController.php';
		$class = new AuthController($mysqli);
		$class->logout();
	break;

	case 'admin/dashboard':
		require 'controllers/AdminController.php';
		$class = new AdminController($mysqli);
		$class->dashboard();
		break;

	case 'admin/notif':
		require 'controllers/AdminController.php';
		$class = new AdminController($mysqli);
		$class->notifmin();
	break;

	case 'admin/search':
		require 'controllers/AdminController.php';
		$class = new AdminController($mysqli);
		$class->search();
	break;

	case 'admin/datakeluhan':
		require 'controllers/AdminController.php';
		$class = new AdminController($mysqli);
		$class->datakeluhan();
		break;

	case 'admin/kindepart':
		require 'controllers/AdminController.php';
		$class = new AdminController($mysqli);
		$class->kindepart();
		break;

	case 'admin/kindepartu':
		require 'controllers/AdminController.php';
		$class = new AdminController($mysqli);
		$class->kindepartu();
		break;

	case 'admin/datanggota':
		require 'controllers/AdminController.php';
		$class = new AdminController($mysqli);
		$class->datanggota();
		break;
	
	case 'caree':
		require 'controllers/AdminController.php';
		$class = new AdminController($mysqli);
		$class->search();
		break;

	case 'admin/keluhan':
		require 'controllers/AdminController.php';
		$class = new AdminController($mysqli);
		$class->keluhan();
		break;

	case 'admin/user/insert':
		# code...
		require 'controllers/AdminController.php';
		$class = new AdminController($mysqli);
		$class->user_act_insert();
		break;

	case 'show':
		# code...
		require 'controllers/AdminController.php';
		$class = new AdminController($mysqli);
		$class->shoing();
		break;

	case 'showkel':
		# code...
		require 'controllers/AdminController.php';
		$class = new AdminController($mysqli);
		$class->shobles();
		break;

	case 'admin/edit/user':
		# code...
		require 'controllers/AdminController.php';
		$class = new AdminController($mysqli);
		$class->user_edit_act();
		break;

	case 'admin/user/delete':
		# code...
		require 'controllers/AdminController.php';
		$class = new AdminController($mysqli);
		$class->user_delete_act();
		break;

	case 'admin/komentar/insert':
		# code...
		require 'controllers/AdminController.php';
		$class = new AdminController($mysqli);
		$class->komentar_act_insert();
		break;

	case 'super/dashboard':
		# code...
		require 'controllers/AdminController.php';
		$class = new AdminController($mysqli);
		$class->dashboard();
		break;

	case 'rate':
		# code...
		require 'controllers/UserController.php';
		$class = new UserController($mysqli);
		$class->rateclose();
		break;

	default:
		# code...
		require 'views/client/login.php';
		break;
}

?>