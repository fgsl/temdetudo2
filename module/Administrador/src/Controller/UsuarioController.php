<?php
namespace Administrador\Controller;

use Laminas\Mvc\Controller\AbstractActionController;
use Laminas\View\Model\ViewModel;
use Administrador\Form\Usuario;
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
        return new ViewModel();
    }
    
    public function editAction()
    {
        $form = new Usuario();
        $action = $this->url()->fromRoute('usuario',['action' => 'save']);
        $form->setAttribute('action',$action);
    
        return new ViewModel([
            'form' => $form
        ]);
    }
    
    public function saveAction()
    {
       
        $nome = $this->getRequest()->getPost('nome');
        $senha = $this->getRequest()->getPost('senha');
        $codigo_papel = $this->getRequest()->getPost('codigo_papel');
        
        
        $this->usuarioTable->save([
            'nome' => $nome,
            'senha' => $senha,
            'codigo_papel' => $codigo_papel
        ]);
        return $this->redirect()->toRoute('usuario');
    }
}
