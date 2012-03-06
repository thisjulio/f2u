<?php
	class mysql implements db{
		public function connect(array $arg_connect){
			return 1;
		}
		
		public function query($sql){
			return 1;
		}
		
		public function fetch_array(){
			return 1;
		}
		
		public function __construct(){
			echo "Sou uma abstração de banco de dados mysql!";
		}
	
	}

?>
