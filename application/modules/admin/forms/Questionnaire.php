<?php
class Admin_Form_Questionnaire extends Zend_Form
{
    
    
    public function init()
    {        
        $this->setName('admin_form_questionnaire');
        
        /******************************/
        /*          NAME              */
        /******************************/
        $name = new Zend_Form_Element_Text('questionnaire_name');
        $name->setLabel('Nom du questionnaire')
              ->setRequired(true)
              ->setAttrib('class', 'questionnaire_name')
              ->addFilter('StripTags')
              ->addFilter('StringTrim')
              ->addValidator('NotEmpty');
        $this->addElement($name);

        
        /******************************/
        /*          TIMER             */
        /******************************/
        $timer = new Zend_Form_Element_Text('timer');
        $timer->setLabel('Durée du questionnaire')
              ->setRequired(true)
              ->setAttrib('class', 'timer')
              ->addFilter('StripTags')
              ->addFilter('StringTrim')
              ->addValidator('NotEmpty');
        $this->addElement($timer);
        
        
        /******************************/
        /*          NB Question       */
        /******************************/
        $nbQuestion = new Zend_Form_Element_Text('nbquestion');
        $nbQuestion->setLabel('Nombre de question poser lors du questionnaire')
                   ->setRequired(true)
                   ->setAttrib('class', 'nbquestion')
                   ->addFilter('StripTags')
                   ->addFilter('StringTrim')
                   ->addValidator('NotEmpty');
        $this->addElement($nbQuestion);
        
        
        
        /******************************/
        /*          ENVOYER           */
        /******************************/
        $envoyer = new Zend_Form_Element_Submit('Valider');
        $envoyer->setAttrib('id', 'boutonvalider')
                ->setAttrib('class', 'button');
        $this->addElement($envoyer);
    }
    
    
}