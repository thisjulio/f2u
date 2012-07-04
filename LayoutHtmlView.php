<?php
	//@todo documentar classe LayoutHtmlView.
	class LayoutHtmlView implements View{
		private $layout;
		private $groupView;
		public function LayoutHtmlView($htmlFile){
			$this->setLayout(file_get_contents($htmlFile));
			$this->groupView = array();
		}
		public function setLayout($layout_string){
			$this->layout = $layout_string;
		}
		public function getLayout(){
			return $this->layout;
		}
		public function addIn($key,View $view){
			$this->groupView[$key] = $view;
		}
		public function toShow(){
			foreach($this->groupView as $key => $view)
				$this->setLayout(str_replace(":{$key}:", $view->toShow(), $this->getLayout()));
			return $this->getLayout();
		}
	}
