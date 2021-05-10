<?php
namespace Administrador\Controller;

use Laminas\Mvc\Controller\AbstractActionController;
use Laminas\View\Model\ViewModel;
use Administrador\Form\Produto as ProdutoForm;
use Administrador\Model\Produto;
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
        $key = $this->params('key');
       
        $produto = new Produto(); 
        if (!empty($key)){
            $produto = $this->produtoTable->getOne($key);
        } 
    
        $form = new ProdutoForm();
        $form->bind($produto);
        $action = $this->url()->fromRoute('produto',['action' => 'save']);
        $form->setAttribute('action',$action);
    
        return new ViewModel([
            'form' => $form
        ]);
    }
    
    public function saveAction()
    {
        $produto = new Produto($this->getRequest());        
        
        $this->produtoTable->save($produto);
        
        return $this->redirect()->toRoute('produto');
    }
}
