<?php
namespace Administrador\Model;

class ProdutoTable extends AbstractTable {
   
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
}
