<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap {
	
	protected function _initAutoLoader() {
		/*
		 * $autoloader = Zend_Loader_Autoloader::getInstance();
		 * $autoloader->setFallbackAutoloader(true); return $autoloader;
		 */
	}
	
	protected function _initView() {
		$view = new Zend_View();
		$view->env = APPLICATION_ENV;
		$view->doctype('HTML5');
		$view->setEncoding('utf-8');
	
		$view->headMeta()->setCharset('utf-8')
		                 ->appendHttpEquiv('X-UA-Compatible', 'IE=edge,chrome=1')
		                 ->appendName ( 'viewport', 'width=device-width' );
		
		$view->headTitle()->setSeparator ( ' - ' );
		$view->headTitle( 'Hades' );
		
		$view->headLink()->appendStylesheet( '/css/bootstrap.min.css')
		                 ->appendStylesheet('/css/bootstrap-responsive.min.css')
		                 ->appendStylesheet ('/css/main.css');
		
		$view->headScript()->appendFile('/js/vendor/modernizr-2.6.2-respond-1.1.0.min.js');
		
		$view->inlineScript()->appendFile('//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js')
                             ->appendScript('window.jQuery || document.write(\'<script src="js/vendor/jquery-1.10.1.min.js"><\/script>\')')
		                     ->appendFile ( '/js/vendor/bootstrap.min.js' )
		                     ->appendFile ( '/js/vendor/main.js' );
		
		
		$view->addHelperPath(APPLICATION_PATH . '/modules/home/views/helpers', 'Zend_view_helper');
		// Add it to the ViewRenderer
		$viewRenderer = Zend_Controller_Action_HelperBroker::getStaticHelper('ViewRenderer');
		$viewRenderer->setView($view);
		
		return $view;
	}
	
	protected function _initViewHelpers() {
		Zend_Paginator::setDefaultScrollingStyle('Sliding');
		Zend_View_Helper_PaginationControl::setDefaultViewPartial('pagination.phtml');
	}
}

