<?php

/**
 * Created by PhpStorm.
 * User: tracy
 * Date: 6/19/2018
 * Time: 12:14 PM
 */
class Pages extends Collection //two methods that MUST be implemented
{
    protected function setEntity()
    {
        $this->entity = 'pages';
    }

    public function getTitle()
    {
        //since always using a single page, can set method to always return current title
        return $this->current()->title;
    }
    public function featuredImage()
    {
       return $this->current()->image;
    }
}