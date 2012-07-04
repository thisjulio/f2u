<?php
	//@todo documentar classe abstrata App
	/**
	 * 
	 * Classe vital do F2U, esta classe modela o APP genérico para implementação dos usuários
	 * @author Julio Cesar 
	 *
	 */
	abstract class App{
		/**
		 * 
		 * Variaveis privadas do APP
		 * @var		View	$view		View principal do APP
		 * @var		array	$action		Array que conterá todas as Actions do APP
		 */
		private $view;
		private $actions = array();
		
		/*
		 * Methods
		 */
		/**
		 * 
		 * Este método executa as Action's registradas se houver chamada de action
		 */
		private function action(){
			if($_SERVER["REQUEST_METHOD"]=="POST" && count($_POST) && array_key_exists('action', $_POST)){
				$this->actions[$_POST["action"]]->run($_POST);
			}
			elseif($_SERVER["REQUEST_METHOD"]=="GET" && count($_GET) && array_key_exists('action', $_GET)){
				$this->actions[$_GET["action"]]->run($_GET);
			}
		}
		
		/**
		 * 
		 * Registra uma Action no App
		 * @param Action $action	Action a ser registrada
		 */
		public function registerAction(Action $action){
			$this->actions[$action->getActionName()] = $action;
		}
		
		/**
		 * 
		 * Transforma um arquivo html na View do App
		 * @param string $html_file		Arquivo html a ser carregado na View
		 */
		public function setHtmlView($html_file){
			$this->view = new LayoutHtmlView($html_file);
		}
		
		/**
		 * 
		 * Trasforma uma View na View do App
		 * @param View $view	View a ser transformada na View do App
		 */
		public  function setView(View $view){
			$this->view = $view;
		}
		
		/**
		 * 
		 * Retorna a View do App
		 * @return View
		 */
		public function getView(){
			return $this->view;
		}
		
		/**
		 * 
		 * Executa o App seguindo a ordem: start,action,end
		 */
		public function execute(){
			$this->start();
			$this->action();
			$this->end();
		}
		
		/**
		 * 
		 * Exibe a View do App
		 */
		public function end(){
			echo $this->getView()->toShow();
		}
		/*
		 * Abstract Methods
		 */
		
		/**
		 * 
		 * Método a ser implementado por todos os App's
		 */
		public abstract function start();
	}