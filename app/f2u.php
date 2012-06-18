<?php
//defining a new Controller called f2u extending app, which have the main Controller functions
class f2u extends app{
	public function run(){ //Default function for Controller entrance
		$page_vars = array(
			"title" => "f 2 u",
			"content" => "What you want <-> What you can do"
		);
		$this->loadview(new default_template(),"f2u",$page_vars); //Loading a new view
	}
}