<?php

	//echo of time execution
	function exectime(){
		$start = microtime(true);
		$total = microtime(true) - $start;
		echo 'Execution time: ' . number_format($total, 6) . ' ms';
	}
	
	//get URL parameters
	function geturlparameters(){
			$strparam = substr($_SERVER['REQUEST_URI'],strpos($_SERVER['REQUEST_URI'],'.php')+5);
			$param = explode("/",$strparam);
			print_r($param);
	}
?>
