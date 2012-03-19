<?php
	class mysql implements db{
		protected $link;
		protected $result_now,$result_last;
		public function connect(array $arg_connect){
			$this->link=mysql_connect($arg_connect["server"],$arg_connect["username"],$arg_connect["password"]);
			$this->selectDB($arg_connect["dbname"]);
		}
		
		public function selectDB($dbname){
			mysql_select_db($dbname);
		}
		
		public function query($sql){
			$this->result_last=$this->result_now;
			$this->result_now=mysql_query($sql);
		}
		
		public function fetch_array(){
			return mysql_fetch_array($this->result_now);
		}
		
		public function to_array(){
			$array = array();
			while($line = $this->fetch_array())
				$array[] = $line;
			return $array;
		}
	}

?>
