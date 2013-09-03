<?php

class Admin_QuestionController extends Zend_Controller_Action {

    public function init() {
    }
    
    public function addquestionAction()
    {
            $form = new Admin_Form_Question();

            $this->view->form = $form;
        
            if ($this->getRequest()->isPost()) 
            {
                $questionData = $this->getRequest()->getPost();
                
                if ($form->isValid($questionData)) {
                    $name = $form->getValue('questionnaire_name');
                    $timer = $form->getValue('timer');
                    $nbQuestion = $form->getValue('nbquestion');
                    
                    
                    $db_questionnaires = new Admin_Model_DbTable_Questionnaire();
                    $db_questionnaires->ajouterQuestionnaire($name, $timer, $nbQuestion);
                }
                $this->_helper->redirector('index', 'index', 'admin');
            }
    }
}
