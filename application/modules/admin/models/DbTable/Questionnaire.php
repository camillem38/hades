<?php

class Admin_Model_DbTable_Questionnaire extends Zend_Db_Table_Abstract
{

    protected $_name = 'Questionnaire';
    
    public function ajouterQuestionnaire($name, $timer, $nbQuestion)
    {
        $data = array(
            'name' => $name,
            'timer' => $timer,
            'nbQuery' => $nbQuestion,
        );
        $this->insert($data);
    }
    
    public function supprimerQuestionnaire($id)
    {
        $row = $this->fetchRow('idQuestionnaire = '. $id);
        $row->delete();
    }
    
}

