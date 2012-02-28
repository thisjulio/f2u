<?php

	abstract class app{
		
		protected function loadview(template $control_template,$file_template,$data=NULL){
			$control_template->view($file_template,$data);
		}
			
		
		
		abstract public function call();
		
	}

?>
