<?php
namespace Administrador\Controller;

use Laminas\Mvc\Controller\AbstractActionController;
use Laminas\View\Model\ViewModel;
use Administrador\Form\Produto;
use Administrador\Model\ProdutoTable;

class ProdutoController extends AbstractActionController{
    /** @var ProdutoTable **/
    private $produtoTable;

    public function __construct(ProdutoTable $produtoTable)
    {
        $this->produtoTable = $produtoTable;
    }

    public function indexAction()
    {
        $produtos = $this->produtoTable->getAll();
        return new ViewModel([
            'produtos' => $produtos
        ]);
    }
    
    public function editAction()
    {
        $form = new Produto();
        $action = $this->url()->fromRoute('produto',['action' => 'save']);
        $form->setAttribute('action',$action);
    
        return new ViewModel([
            'form' => $form
        ]);
    }
    
    public function saveAction()
    {
        $codigo = $this->getRequest()->getPost('codigo');
        $nome = $this->getRequest()->getPost('nome');
        $preco = $this->getRequest()->getPost('preco');
        
        
        $this->produtoTable->save([
            'nome' => $nome,
            'preco' => $preco
        ]);
        return $this->redirect()->toRoute('produto');
    }
}
