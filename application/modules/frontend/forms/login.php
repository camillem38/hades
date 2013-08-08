<?php

class Frontend_Form_Login extends Zend_Form
{
	public function init()
	{
		$this->setMethod('post');
		$this->addElement('text', 'email', array(
            'label'      => 'Login :',
            'required'   => true,
            'filters'    => array('StringTrim'),
            'validators' => array(
                'EmailAddress',
            )
        ));
		$this->addElement('submit', 'submit', array(
			'ignore'   => true,
			'label'    => "S'identifier",
		));
	}
}