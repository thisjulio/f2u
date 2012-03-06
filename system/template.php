<?php
	abstract class template{
		
		public $DATA;
		protected $file_template;
		public $tempate;
	
		public function showTemplate(){ //method of exhibition template
		   	eval ('?>'.$this->template.'<?php ');
		 }
		
		abstract public function setFileTemplate($file_template);
		
		abstract public function setDATA($DATA);
		
		abstract public function engineTemplate(); //method of treatment template
		
		abstract public function view($file_template,$DATA); //method of construct and exibition template
		
		abstract public function loadTemplate(); //load $this->file_template to string $this->template
	}
?>
