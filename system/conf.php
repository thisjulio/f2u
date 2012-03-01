<?php

	//class to echo of time execution
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
			if ($strparam){
				$param = explode("/",$strparam);
				return $param;
			}else{
				return NULL;
			}	
	}

?>
