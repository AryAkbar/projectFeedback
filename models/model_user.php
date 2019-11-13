<?php
	class Model_user{
		 protected $connection;
		 function __construct($connection){
		 	$this->connection = $connection;
		 }

		 public function all($table){
		 	$sql = "SELECT * FROM $table";
		 	$exec = $this->connection->query($sql);
		 	$result = [];
		 	while($fetch = $exec->fetch_object()){
		 		array_push($result, $fetch);
		 	}
		 	return $result;
		 }

         public function rendem($tambahblok){
            $sql = "SELECT * FROM user where role = $tambahblok";
            $exec = $this->connection->query($sql);
            $result = [];
            while($fetch = $exec->fetch_object()){
                array_push($result, $fetch);
            }
            return $result;
         }

		 public function selectable($table, $plus_query){
		 	$sql = "SELECT * FROM $table WHERE $plus_query";
		 	$exec = $this->connection->query($sql);
		 	$result = [];
		 	while($fetch = $exec->fetch_object()){
		 		array_push($result, $fetch);
		 	}
		 	return $result;
		 }

		 public function selesai($table, $id, $stats){
		 	$sql = "SELECT * FROM $table WHERE id_user='$id' and status='$stats'";
		 	$exec = $this->connection->query($sql);
		 	$result = [];
		 	while($fetch = $exec->fetch_object()){
		 		array_push($result, $fetch);
		 	}
		 	return $result;
		 }

		 public function showforeignall(){
		 	$query = "SELECT keluhan.id_keluhan, user.id_user, keluhan.judul, user.imgdir, keluhan.deskripsi, user.name, keluhan.tanggal_upload FROM keluhan, user WHERE keluhan.id_user = user.id_user ORDER BY id_keluhan DESC";
        	$exec = $this->connection->query($query);
        	$result = [];
        	while($fetch = $exec->fetch_object()){
        		array_push($result, $fetch);
        	}
        	return $result;
		 }

		public function showforeign($id){
        	$query = "SELECT keluhan.id_keluhan, keluhan.tanggal_upload, keluhan.judul, departemen.departemen, user.imgdir, user.name, keluhan.deskripsi, keluhan.status, keluhan.tanggal_upload FROM keluhan, departemen, user WHERE keluhan.id_user = '$id' and keluhan.id_departemen = departemen.id_departemen and keluhan.id_user = user.id_user ORDER BY id_keluhan DESC";
        	$exec = $this->connection->query($query);
        	$result = [];
        	while($fetch = $exec->fetch_object()){
        		array_push($result, $fetch);
        	}
        	return $result; 
    	}

    	public function showpost($id){
    		$query = "SELECT keluhan.id_keluhan, keluhan.id_user, user.imgdir, keluhan.tanggal_upload, keluhan.judul, departemen.departemen, keluhan.deskripsi, keluhan.status, keluhan.tanggal_upload, user.name FROM keluhan, departemen, user WHERE keluhan.id_keluhan = $id and keluhan.id_departemen = departemen.id_departemen and keluhan.id_user = user.id_user";
       		$exec = $this->connection->query($query);
    		$result = [];
    		while($fetch = $exec->fetch_object()){
    			array_push($result, $fetch);
    		}
    		return $result;
    	}

    	public function showpostcomment($id){
        	$query = "SELECT komentar.komentar, user.imgdir, user.id_user, user.name, komentar.tanggal_komentar, keluhan.id_keluhan, komentar.id_komentar FROM komentar,user,keluhan WHERE komentar.id_keluhan=keluhan.id_keluhan and komentar.id_user = user.id_user and keluhan.id_keluhan = $id ORDER BY tanggal_komentar DESC";
        	$exec = $this->connection->query($query);
        	$result = [];
        	while($fetch = $exec->fetch_object()){
        		array_push($result, $fetch);
        	}
        	return $result;
    	}

        public function max($id, $table){
            $query = "SELECT max($id) as kode FROM $table";
            $hasil = $this->connection->query($query);
            $idkom = 0;
            while ($data  = $hasil->fetch_object()){
                $idkom = $data->kode;
            }  
            $idkom++;
            return $idkom;
        }

    	public function insert($table, $data){
    		$field = [];
    		$values = [];
    		foreach ($data as $row => $value) {
    			# code...
    			array_push($field, $row);
    			array_push($values, $value);
    		}
    		$values = array_map( function($val){
    			return "'".$val."'";
    		}, $values);
    		$plus_field = implode(',', $field);
    		$plus_values = implode(',', $values);
    		$query = "INSERT INTO $table ($plus_field) VALUES ($plus_values)";
    		$exec = $this->connection->query($query);
     	}

        public function deleted($table, $data){
            $isi = [];
            foreach ($data as $key => $value) {
                # code...
                $isi[] = $key ."=". $value;
            }
            $plus = implode(',', $isi);
            $query = "DELETE FROM $table WHERE $plus";
            $exec = $this->connection->query($query);
        }

        public function edited($table, $data, $plus){
            $isi = [];
            $kondisi = [];
            foreach ($data as $key => $value) {
                # code...
                $isi[] = $key ." = '". $value ."' ";
            }
            foreach ($plus as $key1 => $value1) {
                # code...
                $kondisi[] = $key1 ." = '". $value1 ."' ";
            }
            $plusplus = implode(' ', $kondisi);
            $plusing = implode(',', $isi);
            $query = "UPDATE $table SET $plusing WHERE $plusplus";
            $exec = $this->connection->query($query);
        }

        public function datdiff(){
            $query = "SELECT id_keluhan, terakhir_diupdate, datediff(current_date(), terakhir_diupdate) as selisih from keluhan";
            $exec = $this->connection->query($query);
            $result = [];
            while($fetch = $exec->fetch_object()){
                array_push($result, $fetch);
            }
            return $result;
        }

        public function notife(){
                $ideku = $_POST['no'];  
                $query2 = "SELECT notifikasi.notifikasi, notifikasi.id_notifikasi, user.name, notifikasi.tanggal, keluhan.id_keluhan, notifikasi.from_name from notifikasi, user, keluhan where notifikasi.goal_user = user.id_user and user.id_user = $ideku and notifikasi.goal_user = $ideku and notifikasi.id_keluhan = keluhan.id_keluhan ORDER BY tanggal DESC limit 10";
                $exec = $this->connection->query($query2);
                $result = [];
                while($fetch = $exec->fetch_object()){
                    array_push($result, $fetch);
                }
                return $result;
            }

	}
?>