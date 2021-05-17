<?php
namespace Administrador\Controller;

use Laminas\Mvc\Controller\AbstractActionController;
use Laminas\View\Model\ViewModel;

class IndexController extends AbstractActionController{
    public function indexAction()
    {
        return new ViewModel();
    }
    
    public function menuAction()
    {
        return new ViewModel();
    }
    
    public function loginAction()
    {
        return $this->redirect()->toRoute('admin',[
        'controller' => 'index',
        'action' => 'menu']);
    }
    
    public function logoutAction()
    {
        return $this->redirect()->toRoute('admin');
    }  
}
