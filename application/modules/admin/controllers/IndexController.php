<?php

class Admin_IndexController extends Zend_Controller_Action {

    public function init() {
    }

    public function indexAction() {
        $bdd_questionnaire = new Frontend_Model_DbTable_Questionnaire();
        $this->view->questionnaires = $bdd_questionnaire->fetchAll(null,'name');
    }
    
    public function addquestionnaireAction() {
            $form = new Admin_Form_Questionnaire();
            
            $this->view->form = $form;
            
            if ($this->getRequest()->isPost()) {
                $questionnaireData = $this->getRequest()->getPost();
                
                if ($form->isValid($questionnaireData)) {
                    $name = $form->getValue('questionnaire_name');
                    $timer = $form->getValue('timer');
                    $nbQuestion = $form->getValue('nbquestion');
                    
                    
                    $db_questionnaires = new Admin_Model_DbTable_Questionnaire();
                    $db_questionnaires->ajouterQuestionnaire($name, $timer, $nbQuestion);
                }
                $this->_helper->redirector('index', 'index', 'admin');
            }
            
    }

    
    public function delquestionnaireAction() {
        $id = $this->_getParam("id");
        $db_questionnaires = new Admin_Model_DbTable_Questionnaire();
        $db_questionnaires->supprimerQuestionnaire($id);

        $this->_helper->redirector('index', 'index', 'admin');
    }
}
