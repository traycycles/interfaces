<?php
/**
 * Created by PhpStorm.
 * User: tracy
 * Date: 6/14/2018
 * Time: 10:46 PM
 */

interface CollectionInterface extends Iterator, Countable
{
//must implement the iterator and countable interfaces if implementing collectioninterface
    public function shortDescription();
    public function getTitle();
}