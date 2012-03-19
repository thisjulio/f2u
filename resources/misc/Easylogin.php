<?php

	class Easylogin{
		protected $response_request;
		protected $require_fields;
		protected $model_fields_return;
		protected $model_table_name;
		protected $user_require_value;
		protected $driver_db;
		
		public function startDatabase($driver,array $connect_data){
			$this->driver_db = database::factory($driver);
			$this->driver_db->connect($connect_data);
		}
		
		public function sendRequest(){
			$Request = "SELECT {$this->model_fields_return} FROM {$this->model_table_name} WHERE";
			$where = "";
			foreach ($this->require_fields as $field) {
				$where .= " AND {$field} LIKE '{$this->user_require_value[$field]}'";
			}
			$where=substr($where, 4);
			$Request .= $where;
			$this->driver_db->query($Request);
		}
		
		public function modelTableName($table_name){
			$this->model_table_name = $table_name;
		}
		
		public function modelFieldsreturn($fields){
			$this->model_fields_return = $fields;
		}
		
		public function requireFields(){
			$this->require_fields=func_get_args();
		}
		
		public function requireRequestValues($method){
			$this->user_require_value = $method;
		}
		
		public function pass(){
			$result = $this->driver_db->to_array();
			if(count($result))
				echo "PASS!";
			else
				echo "DON'T PASS!";
		}
	}
	require "../../system/database.php";
	require "../../system/interfaces/db.php";
	require "../../system/drivers/mysql.php";
	$teste = new Easylogin();
	$d = array(
		"server" => "localhost",
		"username" => "root",
		"password" => "123",
		"dbname" => "login"
	);