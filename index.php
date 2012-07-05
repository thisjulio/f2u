<?php
	function __autoload($classname){
			if(file_exists("{$classname}.php"))
				require_once "{$classname}.php";
	}
	
	//O teste!
	
	class ActionSimple implements Action{
		public function run($data){
			echo "realizei uma ação!";
		}
		
		public function getActionName(){
			return get_class($this);
		}
	}
	
	class ActionComplexa implements Action{
		public $agent;
		public function ActionComplexa(App $agent){
			$this->agent = $agent;
		}
		public function run($data){
			$view = new CompositeTextView();
			$view->add(new TextView("Realizei uma ação complexa!"));
			$view->add(new TextView($data['usuario']));
			$view->add(new TextView($data['senha']));
			$this->agent->setView($view);
		}
		
		public function getActionName(){
			return get_class($this);
		}
	}
	
	class CountAction implements Action{
		public $who;
		public function CountAction($who){
			$this->who = $who;
		}
		public function run($data){
			echo "realizei a {$this->who} ação!";
		}
		
		public function getActionName(){
			return get_class($this).$this->who;
		}
	}
	
	class MyApp extends App{
		public function start(){
			$this->setHtmlView("example.html");
			$text = new TextView("FOO");
			$comp = new CompositeTextView();
			$comp->add(new TextView("asd"));
			$comp->add(new TextView("das"));
			$comp->add(new TextView("fgh"));
			$this->getView()->addIn("data",$text);
			$this->getView()->addIn("anotherdata",new TextView("ASDFG"));
			$this->getView()->addIn("datagroup", $comp);
		}
	}
	
	class MyApp2 extends App{
		public function start(){
			$this->setHtmlView("example2.html");
			$form1 = new TextView("usuario");
			$form2 = new TextView("senha");
			$this->getView()->addIn("title", new TextView("Exemplo de formulário!"));
			$this->getView()->addIn("form1", $form1);
			$this->getView()->addIn("form2", $form2);
			
		}
	}
	
	
	
	class MyApp3 extends App{
		public function start(){
			$form = new FormView("post",new ActionComplexa($this),$this);
			$form->add(new TextView("Usuario:"));
			$form->add(new InputView("text","usuario"));
			$form->add(new TextView("Senha:"));
			$form->add(new InputView("password","senha"));
			$form->add(new InputView("submit","enviar","Enviar"));
			$this->setView($form);
		}
	}
	
	class MyApp4 extends App{
		public function start(){
			$form = new FormView("post", new ActionSimple(), $this);
			$form->add(new InputView("submit", "submit","Realizar uma ação"));
			$this->setView($form);
		}
	}
	
	class MyApp5 extends App {
		function start() {
			$this->setHtmlView("variasForms.html");
			
			$form1 = new FormView("post", new CountAction("primeira"), $this);
			$form1->add(new InputView("submit", "submit","Realizar primeira ação"));
			$form2 = new FormView("post", new CountAction("segunda"), $this);
			$form2->add(new InputView("submit", "submit","Realizar segunda ação"));
			$form3 = new FormView("post", new CountAction("terceira"), $this);
			$form3->add(new InputView("submit", "submit","Realizar terceira ação"));
			
			
			$this->getView()->addIn("form1", $form1);
			$this->getView()->addIn("form2", $form2);
			$this->getView()->addIn("form3", $form3);
			
		}
	}
	
	$t = new MyApp5();
	$t->execute();