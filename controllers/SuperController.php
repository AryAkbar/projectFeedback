<?php
	require 'models/model_sadmin';
	class SuperController{
		protected $sadmin;
		function __construct($connection){
			$this->$sadmin = new ModelSadmin($connection)
			if(!isset($_SESSION['logged'])){
				header('location:index.php?url=login&&check=false');
			}
		}
	}
?>