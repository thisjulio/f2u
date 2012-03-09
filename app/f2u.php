<?php
	class f2u extends app{
		public function run(){
			$page_vars = array(
				"title" => "f 2 u",
				"content" => "What you want <-> What you can do"
			);
			$this->loadview(new default_template(),"f2u",$page_vars);
		}
	}

?>
