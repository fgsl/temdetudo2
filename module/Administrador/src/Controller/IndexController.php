<?php
namespace Administrador\Controller;

use Laminas\Mvc\Controller\AbstractActionController;
use Laminas\View\Model\ViewModel;
use Laminas\Db\Adapter\AdapterInterface;

class IndexController extends AbstractActionController{
    /** @var AdapterInterface **/
    private $adapter;
    
    public function __construct(AdapterInterface $adapter)
    {
        $this->adapter = $adapter;
    }

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
