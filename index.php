<?php

	/*
	 * That's the mark for F2U reestructuration
	 * 
	 */
	require "system/functions.php"; //URL parameters and execution time
	require "system/config.php"; //Define paths
	require "app/router.php"; //Define routes
	
	function __autoload($classname){
		foreach($GLOBALS['path'] as $p) //Get each path defined on config.php and use as $p
			if(file_exists("$p{$classname}.php")) //Verify if the file {$classname}.php exists
				require_once("$p{$classname}.php"); //If it exists, require it
	}
	
	$app = new $default_app();
	$app->run(); //Execute application
	// @TODO: implement the execution of non-default controller
?>
