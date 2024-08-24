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
        $object = $this->find(DBConnection::newInsertedId());
        $defaultVariables = get_class_vars(get_called_class());
        $allVariables = get_class_vars($object);
        $differentVariables = array_diff(array_keys($allVariables), array_keys($defaultVariables));

        foreach ($differentVariables as $attribute) {
            $this->$attribute = $object->$attribute;
        }

        $this->resetQuery();
        return $this;
    }

    protected function update()
    {
        $this->setSql("INSERT INTO {$this->table} SET " . $this->setFillAble() . $this->updatedAt . "= NOW()");
        $this->setWhere("AND ", $this->primaryKey . " = ?");
        $this->setValues($this->primaryKey, $this->{$this->primaryKey});
        $this->executeQuery();
        $this->resetQuery();
    }

    protected function find($id)
    {
        $this->setSql("SELECT * FROM " . $this->table);
        $this->setWhere("AND ", $this->primaryKey . " = ?");
        $this->setValues($this->primaryKey, $id);
        $statement = $this->executeQuery();
        $data = $statement;
        if ($data) {
            return $this->setAttributes($data);
        } else {
            return null;
        }
    }

    protected function get()
    {
        $this->setSql("SELECT * FROM " . $this->table);
        $statement = $this->executeQuery();
        $data = $statement;
        if ($data) {
            $this->setObject($data);
            return $this->collection;
        } else {
            return [];
        }
    }

    protected function delete($id)
    {
        $object = $this;
        $this->resetQuery();
        if ($id) {
            $object = $this->find($id);
            $this->resetQuery();
        }
        $object->setSql("DELETE FROM" . $this->table);
        $object->setWhere("AND", $this->primaryKey . " = ?");
        $object->setValues($this->primaryKey, $object{$object->primaryKey});
        return $object->executeQuery();
    }
}
