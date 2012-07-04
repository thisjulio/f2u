<?php
	class CompositeIndexException extends Exception{
		public function __toString(){
			return "Indice fora do limite da composição!";
		}
	}
	/**
	 * Classe que trata das composições genéricas do F2U
	 * @author Julio Cesar
	 */
	class Composite{
		private $composite;
		private $size;
		
		public function Composite(){
			$this->composite = array();
			$this->size = -1;
		}
		
		public function add($element){
			$this->composite[] = $element;
			$this->size++;
		}
		
		public function get($i){
			if($i<=$this->size() && $i>=0)
				return $this->composite[$i];
			else
				throw new CompositeIndexException();
		}
		
		public function size(){
			return $this->size;
		}
	}
	
	$a = new Composite();
	$a->add("bola");
	$a->add(112233);
	$a->add(1);
	try{
		echo $a->get(2);
		
	}catch (CompositeIndexException $e){
		echo "Erro de indice!";
	}