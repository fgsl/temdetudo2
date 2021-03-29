<?php
namespace Administrador\Form;

use Laminas\Form\Form;
use Laminas\Form\Element\Text;
use Laminas\Form\Element\Number;

class Produto extends Form {
    public function __construct($name = 'produto')
    {
        parent::__construct($name);
        $element = new Text('nome'); // atributo name do INPUT TEXT
        $element->setLabel('Nome:');
        
        $this->add($element);
        
        $element = new Number('preco'); // atributo name do INPUT NUMBER
        $element->setLabel('Preço:');
        
        $this->add($element);        
    }
}
