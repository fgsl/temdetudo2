<?php
namespace Administrador\Model;

abstract class AbstractModel
{
    public function toArray()
    {
        $attributes = get_object_vars($this);
        unset($attributes['codigo']);
        return $attributes;
    }
    
    public function getArrayCopy()
    {
        return get_object_vars($this);
    }    
}