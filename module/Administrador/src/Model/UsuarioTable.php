<?php
namespace Administrador\Model;

use Laminas\Db\TableGateway\TableGatewayInterface;

class UsuarioTable {
    /** @var TableGatewayInterface **/    
    private $tableGateway;

    public function __construct(TableGatewayInterface $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }
    
    public function save(array $data)
    {
        try {
            $this->tableGateway->insert($data);
        } catch( \Exception $e) {
            error_log($e->getMessage());
        }
    }
}
