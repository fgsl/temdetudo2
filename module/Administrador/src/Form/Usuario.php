<?php
namespace Administrador\Form;

use Laminas\Form\Form;
use Laminas\Form\Element\Text;
use Laminas\Form\Element\Number;
use Laminas\Form\Element\Hidden;
use Laminas\Form\Element\Submit;
use Laminas\Form\Element\Password;

class Usuario extends Form {
    public function __construct($name = 'usuario')
    {
        parent::__construct($name);
        $this->setAttribute('class','form-group');
        
        $element = new Text('nome'); // atributo name do INPUT TEXT
        $element->setLabel('Nome:');
        
        $this->add($element);
        
        $element = new Password('senha'); // atributo name do INPUT PASSWORD
        $element->setLabel('Senha:');
        
        $this->add($element);
        
         $element = new Number('codigo_papel'); // atributo name do INPUT NUMBER
        $element->setLabel('Codigo_papel: ');
        
        $this->add($element);
             
        $element = new Submit('gravar');
        $element->setValue('Salvar');
        
        $this->add($element);
    }
}
