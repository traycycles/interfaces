<?php
/**
 * Created by PhpStorm.
 * User: tracy
 * Date: 6/12/2018
 * Time: 4:51 PM
 */

interface RepositoryInterface
{
    public function all($entity);
    public function find($entity, $id, $field = 'id');
}