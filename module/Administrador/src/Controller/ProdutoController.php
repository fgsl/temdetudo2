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
        return new ViewModel();
    }
    
    public function editAction()
    {
        $form = new Produto();
        $action = $this->url('produto',['action' => 'save']);
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
    }
}
