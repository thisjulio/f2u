<?php 
	//@todo documentar classe TextView.
	class TextView implements View{
		private $text;
		public function TextView($text){
			$this->setText($text);
		}
		public function getText(){
			return $this->text;
		}
		public function setText($text){
			$this->text = $text;
		}
		public function toShow(){
			return $this->getText();
		}
	}