<?php
namespace Administrador\Model;

class Usuario extends AbstractModel
{
    public $codigo;
    public $nome;
    public $senha;
    public $codigoPapel;
    
    public function __construct($request = null)
    {
        if ($request == null) return;
        $this->codigo = $request->getPost('codigo');
        $this->nome = $request->getPost('nome');
        $this->senha = $request->getPost('senha');
        $this->codigoPapel = $request->getPost('codigo_papel');     
    }   
    
    public static function criptografar(string $texto)
    {
        $textoCriptografado = base64_encode(strrev(md5($texto)));
        return $textoCriptografado;
    }
}