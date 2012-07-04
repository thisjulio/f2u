<?php
	
	
	interface Action{
		
		public function run($data);
		public function getActionName();
	}