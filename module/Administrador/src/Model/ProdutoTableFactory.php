<?php
namespace Administrador\Produto;

use Laminas\ServiceManager\Factory\FactoryInterface;
use Interop\Container\ContainerInterface;
use Laminas\Db\TableGateway\TableGateway;

class ProdutoTableFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null) {
        $adapter = $container->get('DbAdapter');
        $tableGateway = new TableGateway('produtos',$adapter);
        $produtoTable = new ProdutoTable($tableGateway);
        return $produtoTable;
    }
}
