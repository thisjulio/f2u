<?php
	
	class database{
	
		public function mysql(){
			return new mysql();
		}
		
		public function sqlite(){
			return new sqlite();
		}
	
	}
	

?>
