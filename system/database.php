<?php
	
	class database{
	
		public function factory($database_manager){
			return new $database_manager();
		}
	
	}
	

?>
