<?php

class Frontend_Form_Login extends Zend_Form
{
	public function init()
	{
		$this
			->setMethod('post')
			->addPrefixPath('Hades_Form_Decorator','Hades/Form/Decorator', 'decorator')
			->setDecorators(array('FormElements','Form'));
			
		$this->addElement('text', 'email', array(
            'required'   => true,
            'filters'    => array('StringTrim'),
            'validators' => array('EmailAddress'),
			'decorators' => array('ViewHelper','ControlGroup'),
			'attribs'    => array('placeholder' => 'Login...')
        ));
		
		$this->addElement('submit', 'submit', array(
			'ignore'     => true,
			'label'      => "S'identifier",
			'attribs'    => array('class' => 'btn btn-success'),
			'decorators' => array('ViewHelper','ControlGroup')
		));
	}
}