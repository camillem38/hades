<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of authentification
 *
 * @author meunier.c
 */
class App_Controller_Plugin_Auth extends Zend_Controller_Plugin_Abstract {
    
    public function preDispatch(Zend_Controller_Request_Abstract $request)
    {
        if ($request->getModuleName()==='rdzadm') {
             
            if(!Zend_Auth::getInstance()->hasIdentity())  
            {  
                
               
              
                 $request->setModuleName('home');
                 $request->setControllerName('auth');
                 $request->setActionName('index');
                 
                 //$request->setDispatched(false);
                
            }else{
                
                 $userInfo = Zend_Auth::getInstance()->getStorage()->read();
                if($userInfo[1]->grade<5){
              
                 $request->setModuleName('home');
                 $request->setControllerName('index');
                 $request->setActionName('index');
                }
            }
        }  
        if ($request->getModuleName()==='gestion') {
             
            if(!Zend_Auth::getInstance()->hasIdentity())  
            {  
                
               
              
                 $request->setModuleName('home');
                 $request->setControllerName('auth');
                 $request->setActionName('index');
                 
                 
                
            }
        } 
        
        
        
    }
}

?>
