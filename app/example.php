<?php
	class example extends app{
		public function call(){
			$control_template = new default_template();
			$control_template->view("example",array("title"=>"EXAMPLE","content"=>"This is a example app!"));
			$calendar = new calendar(2,2012);
		}
	}

?>
