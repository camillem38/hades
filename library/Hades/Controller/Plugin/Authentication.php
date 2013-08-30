<?php

class Hades_Controller_Plugin_Authentication extends Zend_Controller_Plugin_Abstract {
    
    public function preDispatch(Zend_Controller_Request_Abstract $request)
    {
    	if(!Zend_Auth::getInstance()->hasIdentity())
    	{
    		if ($request->getModuleName()==='frontend') {
    			$request
    				->setControllerName('session')
    			    ->setActionName('login');
    		} 
    	} 
    }
}

