<?php
	class InputView implements View{
		private $type,$name,$value;
		
		/**
		 * 
		 * @param string $type	type do input html: 'text','image','submit','button'
		 * @param string $name nome da variável de retorno do input
		 * @param string $value valor do input, por definição seu valor padrão é vazio
		 * @return void
		 */
		public function InputView($type,$name,$value=""){
			$this->type=$type;
			$this->name=$name;
			$this->value=$value;
		}
		
		public function getType(){
			return $this->type;
		}
		
		public function getName(){
			return $this->name;
		}
		
		public function getValue(){
			return $this->value;
		}
		
		public function toShow(){
			return "<input type='{$this->getType()}' name='{$this->getName()}' value='{$this->getValue()}' />";
		}
		
	}