<?php

/**
 * Created by PhpStorm.
 * User: tracy
 * Date: 6/13/2018
 * Time: 4:03 AM
 */
class jsonRepository implements RepositoryInterface
{
    protected $file;
    public function __construct($file)
    {
        $this->file = $file;
    }

    public function all($entity)
    {
        $data = json_decode(file_get_contents($this->file));
        return $data->$entity;
    }

    public function find($entity, $value, $field = 'id')
    {
        foreach($this->all($entity) as $key=>$data){
            if($data->$field == $value){
                return array($data);
            }
        }
    }
}