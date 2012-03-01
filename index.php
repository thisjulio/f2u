<?php
	function __autoload($classname){
			if(file_exists("app/{$classname}.php"))
				require_once "app/{$classname}.php";
			
			if(file_exists("system/{$classname}.php"))
				require_once "system/{$classname}.php";
			
			if(file_exists("system/drives/{$classname}.php"))
				require_once "system/drives/{$classname}.php";
			
			if(file_exists("system/interfaces/{$classname}.php"))
				require_once "system/interfaces/{$classname}.php";
			
			if(file_exists("resourses/control_template/{$classname}.php"))
				require_once "resourses/control_template/{$classname}.php";
			
			if(file_exists("resourses/misc/{$classname}.php"))
				require_once "resourses/misc/{$classname}.php";
			
	}
	
	include "system/conf.php";
	include "app/router.php";
	
	$app = new $default_app();
	$app->run();
?>
