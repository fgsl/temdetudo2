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
                error_log('inclusão de produto');
                $this->tableGateway->insert($produto->toArray());
            } else {
                error_log('alteração de produto ' . $produto->codigo);
                $this->tableGateway->update($produto->toArray(), ['codigo' => $produto->codigo]);            
            }
        } catch( \Exception $e) {
            error_log($e->getMessage());
        }
    }
    
    public function delete($key)
    {
        return $this->tableGateway->delete(['codigo' => $key]);
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
