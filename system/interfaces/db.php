<?php
	
	interface db {
		
		public function connect(array $arg_connect); // The $arg_connect content is values to connect in database. ex.: $arg_connect["host"]
		
		public function query($sql); // Make a consult of sql
		
		public function fetch_array();
	
	}
	
?>
