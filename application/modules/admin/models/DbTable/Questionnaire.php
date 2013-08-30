<?php

class Admin_Model_DbTable_Questionnaire extends Zend_Db_Table_Abstract
{

    protected $_name = 'questionnaire';
    
    public function ajouterQuestionnaire($name, $timer, $nbQuestion)
    {
        $data = array(
            'name' => $name,
            'timer' => $timer,
            'nbQuery' => $nbQuestion,
        );
        $this->insert($data);
    }
}

