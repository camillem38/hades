<?php

class Hades_Form_Decorator_ControlGroup extends Zend_Form_Decorator_Abstract
{
	public function render( $content )
	{
		$element = $this->getElement();
		if( $element->hasErrors() )
		{
			return '<div class="control-group error">' . $content . '</div>' ;
		} else {

			return '<div class="control-group">' . $content . '</div>';
		}
	}
}