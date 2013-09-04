<?php

class Admin_Model_DbTable_Question extends Zend_Db_Table_Abstract
{

    protected $_name = 'Question';
    
    public function ajouterQuestion($libelle, $idQuestionType, $idQuestionnaire)
    {
        $data = array(
            'libelle' => $libelle,
            'idQuestionType' => $idQuestionType,
            'idQuestionnaire' => $idQuestionnaire,
        );
        $this->insert($data);
    }
    
}

