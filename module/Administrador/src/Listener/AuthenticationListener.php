<?php
namespace Administrador\Listener;

use Laminas\Mvc\MvcEvent;
use Laminas\Authentication\AuthenticationService;

class AuthenticationListener
{
    public function verifyIdentity(MvcEvent $event)
    {
        $routeMatch = $event->getRouteMatch();
        $controller = $routeMatch->getParam('controller');
        $action = $routeMatch->getParam('action');
        $routeName = $routeMatch->getMatchedRouteName();
        
        error_log("controller: $controller $action: $action");
        
        if (($controller == 'Administrador\Controller\IndexController' ||
            $controller == 'index') && (
            $action == 'index' || $action == 'login')){
            return;
        }
        $authenticator = new AuthenticationService();
        
        if (!$authenticator->hasIdentity()){
            $url = $event->getRouter()->assemble(
                [
                    'controller' => 'Administrador\Controller\IndexController',
                    'action' => 'index'
                ],
                [
                    'name' => 'admin'
                ]
            );
            error_log($url);
            header('Location: ' . $url);
            exit;
        }        
    }    
}

