<?php
 class Model_admin{
 	protected $connect;
 	function __construct($connect){
 		$this->conn = $connect;
 	}

 	public function all($table){
 		$query = "SELECT * FROM $table";
 		$exec = $this->conn->query($query);
 		$result = [];
 		while($fetch = $exec->fetch_object()){
 			array_push($result, $fetch);
 		}
 		return $result;
	 }

	 public function selectable($table, $plus_query){
		$sql = "SELECT * FROM $table WHERE $plus_query";
		$exec = $this->conn->query($sql);
		$result = [];
		while($fetch = $exec->fetch_object()){
			array_push($result, $fetch);
		}
		return $result;
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



 	 public function allable($table, $plus_query){
 		$query = "SELECT * FROM $table WHERE $plus_query";
 		$exec = $this->conn->query($query);
 		$result = [];
 		while($fetch = $exec->fetch_object()){
 			array_push($result, $fetch);
 		}
 		return $result;
 	}

 	public function max($id, $table){
            $query = "SELECT max($id) as kode FROM $table";
            $hasil = $this->conn->query($query);
            $idkom = 0;
            while ($data  = $hasil->fetch_object()){
                $idkom = $data->kode;
            }  
            $idkom++;
            return $idkom;
        }

 	public function showallfor(){
 		$query = "SELECT keluhan.id_keluhan, user.id_user, keluhan.judul, user.imgdir, keluhan.deskripsi, user.name, keluhan.status, keluhan.tanggal_upload FROM keluhan, user WHERE keluhan.id_user = user.id_user ORDER BY id_keluhan ASC";
        	$exec = $this->conn->query($query);
        	$result = [];
        	while($fetch = $exec->fetch_object()){
        		array_push($result, $fetch);
        	}
        	return $result;
 	}

// 	public function allwhere(){
//   		$query = "SELECT keluhan.id_keluhan, user.id_user, keluhan.judul, user.imgdir, keluhan.deskripsi, user.name, keluhan.status, keluhan.tanggal_upload FROM keluhan, user WHERE keluhan.id_user = user.id_user and status = 'Belum Terbaca' ORDER BY tanggal_upload DESC";
//   		$exec = $this->conn->query($query);
//   		$row = $exec->num_rows;
//  		$result = [];
//  		while($fetch = $exec->fetch_object()){
//  			array_push($result, $fetch);
// 		}
// 	return $result;
// }

 	public function whereall($id){
 		$query = "SELECT keluhan.id_keluhan, keluhan.judul, keluhan.status, keluhan.tanggal_upload, departemen.departemen from keluhan, departemen where keluhan.id_departemen = departemen.id_departemen and keluhan.eksekutor = $id";
 		$exec = $this->conn->query($query);
 		$row = $exec->num_rows;
 		$result = [];
 		while($fetch = $exec->fetch_object()){
 			array_push($result, $fetch);
 		}
 		return $result;
 	}

    public function wherealls(){
        $query = "SELECT keluhan.id_keluhan, keluhan.judul, keluhan.status, keluhan.tanggal_upload, departemen.departemen from keluhan, departemen where keluhan.id_departemen = departemen.id_departemen";
        $exec = $this->conn->query($query);
        $row = $exec->num_rows;
        $result = [];
        while($fetch = $exec->fetch_object()){
            array_push($result, $fetch);
        }
        return $result;
    }

 	public function showpost($id){
    		$query = "SELECT keluhan.id_keluhan, keluhan.id_user, user.imgdir, keluhan.tanggal_upload, keluhan.judul, departemen.departemen, keluhan.deskripsi, keluhan.status, keluhan.tanggal_upload, user.name FROM keluhan, departemen, user WHERE keluhan.id_keluhan = $id and keluhan.id_departemen = departemen.id_departemen and keluhan.id_user = user.id_user";
       		$exec = $this->conn->query($query);
    		$result = [];
    		while($fetch = $exec->fetch_object()){
    			array_push($result, $fetch);
    		}
    		return $result;
    	}
    public function showpostcomment($id){
        	$query = "SELECT komentar.komentar, user.imgdir, user.id_user, user.name, komentar.tanggal_komentar, keluhan.id_keluhan, komentar.id_komentar FROM komentar,user,keluhan WHERE komentar.id_keluhan=keluhan.id_keluhan and komentar.id_user = user.id_user and keluhan.id_keluhan = $id ORDER BY tanggal_komentar DESC";
        	$exec = $this->conn->query($query);
        	$result = [];
        	while($fetch = $exec->fetch_object()){
        		array_push($result, $fetch);
        	}
        	return $result;
    	}

    public function insert($table, $data){
    	$field = [];
    	$record = [];
    	foreach ($data as $key => $value) {
    		# code...
    		array_push($field, $key);
    		array_push($record, $value);
    	}
    	$record = array_map(function($val){
    		return "'".$val."'";
    	}, $record);
    	$con_field = implode(',', $field);
    	$con_record = implode(',', $record);
    	$query = "INSERT INTO $table ($con_field) values ($con_record)";
    	$exec = $this->conn->query($query);
    }

    public function update($table, $data, $plus){
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
            $exec = $this->conn->query($query);
        }

    public function delete($table, $data){
            $isi = [];
            foreach ($data as $key => $value) {
                # code...
                $isi[] = $key ."=". $value;
            }
            $plus = implode(',', $isi);
            $query = "DELETE FROM $table WHERE $plus";
            $exec = $this->conn->query($query);
        }

    public function notife(){
            $ideku = $_POST['no'];  
            $query2 = "SELECT notifikasi.notifikasi, notifikasi.id_notifikasi, user.name, notifikasi.tanggal, keluhan.id_keluhan, notifikasi.from_name from notifikasi, user, keluhan where notifikasi.goal_user = user.id_user and user.id_user = $ideku and notifikasi.goal_user = $ideku and notifikasi.id_keluhan = keluhan.id_keluhan ORDER BY tanggal DESC limit 10";
            $exec = $this->conn->query($query2);
            $result = [];
            while($fetch = $exec->fetch_object()){
                 array_push($result, $fetch);
            }
            return $result;
        }

    public function kindeartu($dept){
        $query = "SELECT user.name, departemen.id_departemen, departemen.departemen, record.belum_terjawab, record.menunggu_balasan, record.balasan_klien, record.tutup from user, departemen, record where record.id_user = user.id_user and record.id_departemen = departemen.id_departemen and departemen.departemen = '$dept'";
        $exec = $this->conn->query($query);
        $result = [];
        while($fetch = $exec->fetch_object()){
            array_push($result, $fetch);
        }
        return $result;
    }
 }
?>