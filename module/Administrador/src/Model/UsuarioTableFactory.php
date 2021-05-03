<?php
namespace Administrador\Model;

use Laminas\ServiceManager\Factory\FactoryInterface;
use Interop\Container\ContainerInterface;
use Laminas\Db\TableGateway\TableGateway;

class UsuarioTableFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null) {
        $adapter = $container->get('DbAdapter');
        $tableGateway = new TableGateway('usuarios',$adapter);
        $usuarioTable = new UsuarioTable($tableGateway);
        return $usuarioTable;
    }
}
