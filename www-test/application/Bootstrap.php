<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap{
    protected function _initAutoLoader(){
        /*$autoloader = Zend_Loader_Autoloader::getInstance();
        $autoloader->setFallbackAutoloader(true);
        return $autoloader;*/
    }
     protected function _initView() {
        $view = new Zend_View();
        $view->doctype('XHTML1_STRICT');
        $view->setEncoding('UTF-8');
        $view->headTitle()->setSeparator(' - ');
        $view->headTitle('Hades-Test');
        $view->headMeta()->appendHttpEquiv('Content-Type', 'text/html;charset=utf-8');
        $view->env = APPLICATION_ENV;
        $view->addHelperPath(APPLICATION_PATH.'/modules/home/views/helpers', 'Zend_view_helper');
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

