<?php
	class sqlite implements db{
		protected $db;
		protected $DO_now,$DO_last;
		
		public function connect(array $arg_connect){
			$this->db = new SQLite3("database/{$arg_connect["sqlite_file"]}");
		}
		
		public function query($sql){
			$this->DO_last = $this->DO_now;
			$this->DO_now = $this->db->query($sql);
		}
		
		public function fetch_array(){
			return $this->DO_now->fetchArray();
		}
		
	
	}

?>
