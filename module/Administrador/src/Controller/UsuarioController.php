<?php
namespace Administrador\Controller;

use Laminas\Mvc\Controller\AbstractActionController;
use Laminas\View\Model\ViewModel;
use Administrador\Form\Usuario as UsuarioForm;
use Administrador\Model\Usuario;
use Administrador\Model\UsuarioTable;

class UsuarioController extends AbstractActionController{
    /** @var UsuarioTable **/
    private $usuarioTable;

    public function __construct(UsuarioTable $usuarioTable)
    {
        $this->usuarioTable = $usuarioTable;
    }

    public function indexAction()
    {
        $usuarios = $this->usuarioTable->getAll();
        return new ViewModel([
            'usuarios' => $usuarios
        ]);        
    }
    
    public function editAction()
    {
        $key = $this->params('key');
        
        $usuario = new Usuario();
        if (!empty($key)){
            $usuario = $this->usuarioTable->getOne($key);
        }
        
        $form = new UsuarioForm();
        $form->bind($usuario);
        $action = $this->url()->fromRoute('usuario',['action' => 'save']);
        $form->setAttribute('action',$action);
        
        return new ViewModel([
            'form' => $form
        ]);
    }
    
    public function saveAction()
    {       
        $usuario = new Usuario($this->getRequest());
        
        $this->usuarioTable->save($usuario);
        
        return $this->redirect()->toRoute('usuario');
    }
}
