<?php

class Frontend_SessionController extends Zend_Controller_Action {

	public function loginAction() {
		$request = $this->getRequest();
		$form = new Frontend_Form_Login();
		if ($request->isPost()) {
			if ($form->isValid($request->getPost())) {
				
			}
		}
		$this->view->form = $form->setAction($this->view->url());
	}

}