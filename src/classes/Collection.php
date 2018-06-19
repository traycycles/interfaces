<?php

/**
 * Created by PhpStorm.
 * User: tracy
 * Date: 6/12/2018
 * Time: 4:14 PM
 */

//by changing class to abstract, can no longer instantiate an object... therefore not required to implement ALL methods
//of CollectionInterface
abstract class Collection implements CollectionInterface
{
    protected $repo, $entity;
    public  $collection;

    public function __construct(RepositoryInterface $repo, $id=null, $field='id')
    {
        $this->repo = $repo;
        $this->setEntity(); //making this method be defined in the child
        if(!empty($id)){
            $this->collection = $this->repo->find($this->entity, $id, $field);
        }else{
            $this->collection = $this->repo->all($this->entity);
        }
    }

    public function shortDescription()
    {
        if(strlen($this->current()->details)< 510){
            return strip_tags($this->current()->details);
        }
        return strip_tags(
            substr($this->current()->details, 0,
                strpos($this->current()->details, ' ', 500) //first space after 500 char
            )
        ) . '...';
    }

    public function current()
    {//returns current pointer of the collection array
        //var_dump(__METHOD__);
        return current($this->collection);
    }

    public function key()
    {//returns key of item pointer is on
       // var_dump(__METHOD__);
        return key($this->collection);
    }

    public function next()
    {
       // var_dump(__METHOD__);
        return next($this->collection);
    }
    public function rewind()
    {//resets pointer of array to 1st item
       // var_dump(__METHOD__);
        return reset($this->collection);
    }
    public function valid()
    {
      //  var_dump(__METHOD__);
        return key($this->collection) !==null;
    }
    public function count()
    {//returns # items in array
    return count($this->collection);
    }

    abstract protected function setEntity(); //cannot use private since children will overwrite
}