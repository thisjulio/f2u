<?php
	/*
	 * This class is for analyze the use of system.
	 * For example: How many times the page was accessed, or the link was clicked.
	 * 
	 * Author: Julio Cesar da Silva Pereira <julio-cesar@ufrj.br>
	 */
	class system_metrics{
		private $sqlite;
		
		public function init(){
				$this->sqlite = database::factory("sqlite");
				$connect = array(
					"sqlite_file" => "system_metric.db"
				);
				$this->sqlite->connect($connect);
		
				//If first use
				$this->sqlite->query("CREATE TABLE IF NOT EXISTS metrics (\"id_metric\" INTEGER PRIMARY KEY, \"type\" TEXT NOT NULL, \"val\" INTEGER NOT NULL, \"description\" TEXT)");
				
				//Metric of reloads/open system
				$this->increment("reload");
		}
		
		public function register_to_metric($type,$description=NULL){
			$this->sqlite->query("INSERT INTO metrics(type,val,description) VALUES('{$type}',0,'{$description}')");
		}
		
		public function init_array_metric(array $array_to_metric){
			foreach($array_to_metric as $var)
				$this->increment($var);
		}
		
		private function increment($type){
			$this->sqlite->query("UPDATE metrics SET val = val + 1 WHERE type LIKE '{$type}'");
		}
		
		public function relatory(template $control_template){ //Generate a table html for analyze
			$data = array();
			$this->sqlite->query("SELECT * FROM metrics");
			
			while($result = $this->sqlite->fetch_array())
				$data[] = $result;
			
			$control_template->view("metrics",array("data"=>$data));
		}
			
	}
?>
