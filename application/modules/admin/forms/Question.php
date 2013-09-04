<?php
class Admin_Form_Question extends Zend_Form
{
    
    
    public function init()
    {        
        $this->setName('admin_form_questionnaire');
        
        /******************************/
        /*          QUESTION          */
        /******************************/
        $libelle = new Zend_Form_Element_Text('libelle');
        $libelle->setLabel('Question')
              ->setRequired(true)
              ->setAttrib('class', 'libelle')
              ->addFilter('StripTags')
              ->addFilter('StringTrim')
              ->addValidator('NotEmpty');
        
        $this->addElement($libelle);

        
        /******************************/
        /*          TYPE              */
        /******************************/
        $questionType = new Zend_Form_Element_Select('QuestionType');
        $questionType->setLabel('Type de question')
              ->setRequired(true)
              ->setAttrib('class', 'type');
        $db_QuestionType = new Admin_Model_DbTable_QuestionType();
        $types = $db_QuestionType->fetchAll(null,'idQuestionType');
        foreach($types as $type){
            $questionType->addMultiOption($type->idQuestionType, $type->libelleQuestion);
        }      
        $this->addElement($questionType);
        
        
        
        /******************************/
        /*          ENVOYER           */
        /******************************/
        $envoyer = new Zend_Form_Element_Submit('Valider');
        $envoyer->setAttrib('id', 'boutonvalider')
                ->setAttrib('class', 'button');
        
        $this->addElement($envoyer);
    }
    
    
}