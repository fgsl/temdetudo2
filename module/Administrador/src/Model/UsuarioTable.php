<?php
namespace Administrador\Model;

use Laminas\Db\Sql\Select;

class UsuarioTable extends AbstractTable {
    public function save(Usuario $usuario)
    {
        try {
            if (empty($produto->codigo)){
                error_log('inclusão de usuário');
                $this->tableGateway->insert($usuario->toArray());
            } else {
                error_log('alteração de usuário ' . $usuario->codigo);
                $this->tableGateway->update($usuario->toArray(), ['codigo' => $usuario->codigo]);
            }
        } catch( \Exception $e) {
            error_log($e->getMessage());
        }
    }
    
    public function getAll()
    {
        $select = new Select($this->tableGateway->getTable());
        $select->join('papeis','papeis.codigo = usuarios.codigo_papel',['papel' => 'nome']);
        
        return $this->tableGateway->selectWith($select);
    }
}
