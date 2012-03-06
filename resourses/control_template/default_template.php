<?php
	
	class default_template extends template{
		public $delimiter = ":";
		public $GLOBALdelimiter = "::";
		
		public function error($number){
			switch($number){
				case 1:
					echo "Erro 1# Arquivo não encontrado ou sem extensão .template;";
					exit;
				case 123:
					echo "Error 123# Variável inexistente;";
					exit;
				case 321:
					echo "Error 321# endfor chamado antes de um loop for;";
					exit;
			}
		}
		
		public function setFileTemplate($file_template){
			if (file_exists("template/{$file_template}.html"))
				$this->file_template = "template/{$file_template}.html";	
			else 
				$this->error(1);
		}
		
		public function engineTemplate(){
			
			if (preg_match("/{$this->delimiter}\s*for\s+([^:]+)\s+in\s+\(([^:]+)\)\s*{$this->delimiter}/",$this->template,$result))
					$this->template = preg_replace("/{$this->delimiter}\s*for\s+([^:]+)\s+in\s+\(([^:]+)\)\s*{$this->delimiter}/","<?php foreach (array($2) as \$$1): ?>",$this->template);
			
			if (preg_match("/{$this->delimiter}\s*for\s+([^:]+)\s+in local\s+([^:]+)\s*{$this->delimiter}/",$this->template,$result)){
				if(isset($result[2]))
					$this->template = preg_replace("/{$this->delimiter}\s*for\s+([^:]+)\s+in local\s+([^:]+)\s*{$this->delimiter}/","<?php foreach (\$$2 as \$$1): ?>",$this->template);
				else
					$this->error(123);
			}
			
			if (preg_match("/{$this->delimiter}\s*for\s+([^:]+)\s+in\s+([^:]+)\s*{$this->delimiter}/",$this->template,$result)){
				if(isset($this->DATA[$result[2]]))
					$this->template = preg_replace("/{$this->delimiter}\s*for\s+([^:]+)\s+in\s+([^:]+)\s*{$this->delimiter}/","<?php foreach (\$this->DATA['$2'] as \$$1): ?>",$this->template);
				else
					$this->error(123);
			}
			
			if (preg_match("/<?php.*foreach.*?>/",$this->template))
				$this->template = preg_replace("/{$this->delimiter}\s*endfor\s*{$this->delimiter}/","<?php endforeach; ?>",$this->template);
			if (preg_match("/:\s*endfor\s*:/",$this->template)) 
				$this->error(321);

			if (preg_match("/{$this->GLOBALdelimiter}(\S+){$this->GLOBALdelimiter}/",$this->template,$result)){
				if(isset($this->DATA[$result[1]]))
					$this->template = preg_replace("/{$this->GLOBALdelimiter}(\S+){$this->GLOBALdelimiter}/","<?php echo \$this->DATA['$1']; ?>",$this->template);
				else
					$this->error(123);
			}
			
			if (preg_match("/{$this->delimiter}(\S+){$this->delimiter}/",$this->template,$result)){
				if (isset($result["1"]))
					$this->template = preg_replace("/{$this->delimiter}(\S+){$this->delimiter}/","<?php echo \$$1; ?>\n",$this->template);
				else
					$this->error(123);
			}
			
			if (preg_match("/{$this->delimiter}break{$this->delimiter}/",$this->template,$result))
					$this->template = preg_replace("/{$this->delimiter}break{$this->delimiter}/","<?php break; ?>\n",$this->template);
		}
		
		public function loadTemplate(){
			$this->template = file_get_contents($this->file_template);
		}
		
		public function showTemplate(){
/*
			echo $this->template;
*/
			eval ('?>'.$this->template.'<?php ');
		}
		
		public function setDATA($DATA){
			$this->DATA = $DATA;
		}
		
		public function view($file_template,$DATA=NULL){
			$this->setFileTemplate($file_template);
			$this->setDATA($DATA);
			$this->loadTemplate();
			$this->engineTemplate();
			$this->showTemplate();
		}
	}	
?>
