<?php
	require "system/conf.php";
	require "app/router.php";
	require "system/config.php";
	function __autoload($classname){
		foreach($GLOBALS['path'] as $p)
			if(file_exists("$p{$classname}.php")){
				require_once "$p{$classname}.php";
			}
	}
	$app = new $default_app();
	$app->run();
?>
