<?php
namespace Administrador\Form;

use Laminas\Form\Form;
use Laminas\Form\Element\Text;
use Laminas\Form\Element\Number;
use Laminas\Form\Element\Hidden;
use Laminas\Form\Element\Submit;

class Produto extends Form {
    public function __construct($name = 'produto')
    {
        parent::__construct($name);
        $this->setAttribute('class','form-group');
        
        $element = new Text('nome'); // atributo name do INPUT TEXT
        $element->setLabel('Nome:');
        
        $this->add($element);
        
        $element = new Number('preco'); // atributo name do INPUT NUMBER
        $element->setLabel('Preço:');
        
        $this->add($element);
        
        $element = new Hidden('codigo');
        
        $this->add($element);
        
        $element = new Submit('gravar');
        $element->setValue('Gravar');
        
        $this->add($element);
    }
}
