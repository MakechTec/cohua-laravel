<?php
namespace App\Services;

class Persistence{

    public function save($data, $parentModel, $childModel, $parentIdColumn, $fieldColumn = 'field', $valueColumn = 'value'){
        $entity = new $parentModel();

        foreach($data as $field => $value){
            
            $childModel::create([
                $parentIdColumn => $entity->id,
                $fieldColumn => $field,
                $valueColumn => $value,
            ]);

        }
    }

    public function update($data, $entity, $relation, $fieldColumn = 'field', $valueColumn = 'value'){

        foreach($data as $field => $value){
            $childEntity = $entity->$relation()->where($fieldColumn, $field)->first();
            $childEntity->$valueColumn = $value;
            $childEntity->save();
        }
    }

    public function delete($entity, $relation){
        $entity->$relation()->delete();
        $entity->delete();
    }
}