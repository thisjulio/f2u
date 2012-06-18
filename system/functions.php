<?php
	//class to print the execution time on the screen
	class exectime{
		private $start;
		
		public function exectime(){
			$this->start = microtime(true);
		}
		
		public function end_exectime(){
			echo 'Execution time: ' . number_format(microtime(true) - $this->start, 6) . ' ms';
		}
	}
	
	//get URL parameters
	function geturlparameters(){
			$strparam = substr($_SERVER['REQUEST_URI'],strpos($_SERVER['REQUEST_URI'],'.php')+5);
			if ($strparam) return explode("/",$strparam);
			else return NULL;
	}
?>
