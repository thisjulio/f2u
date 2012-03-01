<?php

	abstract class app{
		
		protected function loadview(template $control_template,$file_template,$data=NULL){
			$control_template->view($file_template,$data);
		}
			
		protected function callapp($app_name){
			$app = new $app_name();
			$app->run();
		}
		
		abstract public function run();
		
	}

?>
