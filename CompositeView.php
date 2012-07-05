<?php
	//@todo documentar classe abstrata CompositeView
	/**
	 * 
	 * Classe abstrata que trata das compoisições de View
	 * @author Julio Cesar
	 *
	 */
	abstract class CompositeView extends Composite implements View{
		/**
		 * Método que adiciona uma View na composição.
		 * @param View $view Componente de View a ser adicionado na composição.
		 * @return void
		 */
		public function add(View $view){
			parent::add($view);
		}
	}