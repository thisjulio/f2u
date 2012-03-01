<?php
	class example extends app{
		public function run(){
			$this->loadview(new default_template(),"example",array("title"=>"EXAMPLE","content"=>"This is a example app!"));
		}
	}

?>
