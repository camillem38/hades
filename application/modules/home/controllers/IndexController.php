<?php

class Home_IndexController extends Zend_Controller_Action {

    public function init() {
    }

    public function indexAction() {
        $bdd_questionnaire = new Home_Model_DbTable_Questionnaire();
        $this->view->questionnaires = $bdd_questionnaire->fetchAll(null,'name');
        //var_dump('<pre>',$this->view->questionnaires, '</pre>');
    }
    
}
