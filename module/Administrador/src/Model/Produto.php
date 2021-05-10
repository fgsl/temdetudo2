<?php
namespace Administrador\Model;

class Produto {
    public $codigo;
    public $nome;
    public $preco;

    public function __construct($request = null)
    {
        if ($request == null) return;    
        $this->codigo = $request->getPost('codigo');
        $this->nome = $request->getPost('nome');
        $this->preco = $request->getPost('preco');        
    }
    
    public function toArray()
    {
        return get_object_vars($this);
    }    
}
