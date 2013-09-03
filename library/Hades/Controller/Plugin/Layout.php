<?php
/*
 * Ce plugin choisit le layout en fonction du module. 
 * le chemin du layout est de la forme :
 * /chemin/vers/le/module/layouts/scripts/nom_du_layout.phtml
 *
 */
class Hades_Controller_Plugin_Layout extends Zend_Controller_Plugin_Abstract {
    
    public function preDispatch(Zend_Controller_Request_Abstract $request)
    {
	$module = $request->getModuleName();
	$layout = Zend_Layout::getMvcInstance();

	$modulePath = Zend_Controller_Front::getInstance()->getModuleDirectory($module);
	$layout->setLayoutPath($modulePath . '/layouts/scripts/');
    }
}

