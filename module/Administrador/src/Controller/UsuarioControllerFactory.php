<?php
namespace Administrador\Controller;

use Laminas\ServiceManager\Factory\FactoryInterface;
use Interop\Container\ContainerInterface;
use Administrador\Model\UsuarioTable;

class UsuarioControllerFactory implements FactoryInterface {
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null) {
        //error_log(__METHOD__);
        $usuarioTable = $container->get(UsuarioTable::class);
        return new UsuarioController($usuarioTable);
    }
}
