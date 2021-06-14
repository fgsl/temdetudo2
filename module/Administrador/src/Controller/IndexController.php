<?php
namespace Administrador\Controller;

use Laminas\Mvc\Controller\AbstractActionController;
use Laminas\View\Model\ViewModel;
use Laminas\Db\Adapter\AdapterInterface;
use Laminas\Authentication\Adapter\DbTable\CredentialTreatmentAdapter as AuthAdapter;
use Laminas\Authentication\AuthenticationService;
use Administrador\Model\Usuario;

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
        $authAdapter = new AuthAdapter($this->adapter);
        
        $authAdapter
        ->setTableName('usuarios')
        ->setIdentityColumn('nome')
        ->setCredentialColumn('senha');
        
        $identity = $this->request->getPost('nome');
        $authAdapter->setIdentity($identity);
        $credential = $this->request->getPost('senha');
        $authAdapter->setCredential(Usuario::criptografar($credential));
        
        $result = $authAdapter->authenticate();
        
        if ($result->isValid()){
            $user = $authAdapter->getResultRowObject(null,'senha');
            $authenticator = new AuthenticationService();
            $authenticator->getStorage()->write($user);
            
            return $this->redirect()->toRoute('admin',[
                'controller' => 'index',
                'action' => 'menu']);
        }
        return $this->logoutAction();
    }
    
    public function logoutAction()
    {
        $authenticator = new AuthenticationService();
        $authenticator->clearIdentity();
        
        return $this->redirect()->toRoute('admin');
    }  
}
