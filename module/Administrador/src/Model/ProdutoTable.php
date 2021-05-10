<?php
namespace Administrador\Model;

use Laminas\Db\TableGateway\TableGatewayInterface;

class ProdutoTable {
    /** @var TableGatewayInterface **/    
    private $tableGateway;

    public function __construct(TableGatewayInterface $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }
    
    public function save(Produto $produto)
    {
        try {
            if (empty($produto->codigo)){
                $this->tableGateway->insert($produto->toArray());
            } else {
                $this->tableGateway->update($produto->toArray(), ['codigo' => $produto->codigo]);            
            }
        } catch( \Exception $e) {
            error_log($e->getMessage());
        }
    }
    
    public function getAll()
    {
        return $this->tableGateway->select();
    }
    
    public function getOne($key)
    {
        return $this->tableGateway->select(['codigo' => $key])->current();
    }
}
