<?php
	/**
	 * Classe que trata das composições genéricas do F2U
	 * esta classe implementa a interface de Iterator do
	 * core Zend
	 * @author Julio Cesar
	 */
	class Composite implements Iterator{
		private $composite;
		private $size;
		private $cursor;
		
		public function Composite(){
			$this->composite = array();
			$this->size = 0;
			$this->cursor = -1;
		}
		
		public function add($element){
			$this->composite[] = $element;
			$this->size++;
			
			if($this->cursor==-1) 
				$this->cursor = 0;
		}
		
		public function get($i){
			if($i<$this->size() && $i>=0)
				return $this->composite[$i];
			else
				throw new CompositeIndexException();
		}
		
		public function current(){
			return $this->get($this->cursor);
		}
		
		public function next(){
			++$this->cursor;
		}
		
		public function rewind(){
			$this->cursor=0;
		}
		
		public function key(){
			return $this->cursor;
		}
		
		public function valid(){
			return isset($this->composite[$this->cursor]);
		}
		
		public function size(){
			return $this->size;
		}
	}
	
	/**
	 *
	 * Exception disparada quando se tenta acessar um valor inválido pelo
	 * método get da Composite
	 *
	 */
	class CompositeIndexException extends Exception{
		public function __toString(){
			return "Indice fora do limite da composição!";
		}
	}
	