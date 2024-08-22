<?php

namespace Core\Database\Traits;

use Core\Database\DBConnection\DBConnection;

trait HasCRUD
{
    protected function setFillAble()
    {
        $fillbles = [];

        foreach ($this->fillable as $attribute) {
            if (isset($this->attribute)) {
                array_push($fillbles, $attribute . " = ?");
                $this->setValue($attribute, $this->attribute);
            }
        }
        return implode(", ", $fillbles);
    }

    protected function insert()
    {
        $this->setSql("INSERT INTO {$this->table} SET " . $this->setFillAble() . $this->createdAt . "= NOW()");
        $this->executeQuery();
        $this->resetQuery();
    }

    protected function update()
    {
        $this->setSql("INSERT INTO {$this->table} SET " . $this->setFillAble() . $this->updatedAt . "= NOW()");
        $this->setWhere("AND ", $this->primaryKey . " = ?");
        $this->setValues($this->primaryKey, $this->{$this->primaryKey});
        $this->executeQuery();
        $this->resetQuery();
    }
}
