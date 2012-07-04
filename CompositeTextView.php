<?php 
	//@todo documentar classe CompositeTextView.
	class CompositeTextView extends CompositeView{
		public function toShow(){
			$return = "";
			foreach($this->getComposite() as $view){
				$return .= "{$view->toShow()}<br />";
			}
			return $return;
		}
	}
