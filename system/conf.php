<?php

	//echo of time execution
	function exectime(){
		$start = microtime(true);
		$total = microtime(true) - $start;
		echo 'Execution time: ' . number_format($total, 6) . ' ms';
	}
?>
