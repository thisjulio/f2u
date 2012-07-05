<?php 
	//@todo documentar classe CompositeTextView.
	class CompositeTextView extends CompositeView{
		public function toShow(){
			$return = "";
			foreach($this as $view){
				$return .= "{$view->toShow()}<br />";
			}
			return $return;
		}
	}
