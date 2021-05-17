<?php
namespace Administrador\Controller;

use Laminas\ServiceManager\Factory\FactoryInterface;
use Interop\Container\ContainerInterface;
use Administrador\Model\ProdutoTable;

class IndexControllerFactory implements FactoryInterface {
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null) {
        $adapter = $container->get('DbAdapter');
        return new IndexController($adapter);
    }
}
