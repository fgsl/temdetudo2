<?php
namespace Administrador\Controller;

use Laminas\Mvc\Controller\AbstractActionController;
use Laminas\View\Model\ViewModel;
use Administrador\Form\Produto;

class ProdutoController extends AbstractActionController{
    public function indexAction()
    {
        return new ViewModel();
    }
    
    public function editAction()
    {
        $form = new Produto();
    
        return new ViewModel([
            'form' => $form
        ]);
    }
}
