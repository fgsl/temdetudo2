<?php
namespace Administrador\Model;

use Laminas\Db\TableGateway\TableGatewayInterface;

abstract class AbstractTable
{
    /** @var TableGatewayInterface **/
    protected $tableGateway;
    
    public function __construct(TableGatewayInterface $tableGateway)
    {
        $this->tableGateway = $tableGateway;
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
