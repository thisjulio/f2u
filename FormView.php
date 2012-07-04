<?php

/**
 * @author Julio Cesar
 */
	class FormView extends CompositeView{
		private $method;
		private $action;

		/**
		 *  Construtor do FormView, o mesmo instancia o método utilizado pelo form e seta a Action
		 *  de controle.
		 *  @param string	$method	método de envio dos dados do formulário
		 *  @param Action	$action	Objeto que implementa interface Action para controlar o formulário
		 *  @param App		$agent	App que registra a Action do formulário
		 *  @return void
		 */
		public function FormView($method,Action $action,App $agent){
			$this->method = $method;
			$this->action = $action;
			$agent->registerAction($action);
		}

		public function toShow(){
			$return = "<form method='{$this->method}'>\n";
			foreach($this->getComposite() as $view){
				$return .= "\t{$view->toShow()}<br />\n";
			}
			return $return."<input type='hidden' name='action' value='{$this->action->getActionName()}'/></form>";
		}
	}