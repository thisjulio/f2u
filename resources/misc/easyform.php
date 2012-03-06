<?php
	
	class easyform{
		public function easyform($action,$method,$data_form){
			$data_form = explode(";", $data_form);
			foreach($data_form as $f)
				$final_data_form[]=explode(",",$f);
			print_r($final_data_form);
		}
	}
	
	$b = new easyform("b","c","text,usuario,teste feito namoral;submit");

?>