<?php
namespace Administrador\Controller;

use Laminas\ServiceManager\Factory\FactoryInterface;
use Interop\Container\ContainerInterface;
use Administrador\Model\ProdutoTable;

class ProdutoControllerFactory implements FactoryInterface {
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null) {
        $produtoTable = $container->get(ProdutoTable::class);
        return new ProdutoController($produtoTable);
    }
}
