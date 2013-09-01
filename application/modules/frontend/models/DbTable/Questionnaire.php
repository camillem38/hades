<?php

class Frontend_Model_DbTable_Questionnaire extends Zend_Db_Table_Abstract
{

    protected $_name = 'questionnaire';
    //protected $_rowClass = 'Application_Model_DbRow_Questionnaire';

    public function __toString()
    {
            if(isset($this->name))
                    return $this->name;
            if(isset($this->timer))
                    return $this->timer;
            if(isset($this->nbQuery))
                    return $this->nbQuery;
        return parent::__toString();
    }
    
}