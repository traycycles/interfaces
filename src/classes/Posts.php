<?php

/**
 * Created by PhpStorm.
 * User: tracy
 * Date: 6/15/2018
 * Time: 4:46 PM
 */
class Posts extends Collection implements TrackableInterface, ShareableInterface
//overrides constructor to set the entity property
{
    //public function __construct(RepositoryInterface $repo, $id=null, $field='id')
    //no longer extending/using constructor. Now extending abstract class. Post class must now use the setEntity method
    public function setEntity()
    {
        $this->entity = 'posts';
       // parent::__construct($repo, $id, $field);
    }

    public function getTitle()
    {
        //if on a single post, want to return current title
        if($this->count() == 1){
            return $this->current()->title;
        }
        return 'Latest Posts';
    }

    public function getAuthor()
    {
        $user = $this->repo->find('users', $this->current()->author);
        if(empty($user->name)){
            return 'Unknown';
        }

        return $user->name;
    }

    public function getDateTime($format = 'D, d M Y H:i:s')
    {
        //create new date/time object
       $date = new DateTime($this->current()->dateTime);
        return $date->format($format);
    }

    public function shareTwitter()
    {
        return urlencode($this->current()->title . ' ')
            . 'http://'
            . $_SERVER['HTTP_HOST']
            . $_SERVER['REQUEST_URI'];
    }

    public function shareEmail()
    {
        return 'subject= ' . urlencode($this->current()->title)
            . '&body= ' . urlencode($this->shortDescription() . '<br/><br/>Read
            more at ')
        . 'http://'
        . $_SERVER['HTTP_HOST']
        . $_SERVER['REQUEST_URI'];
    }

    public function shareFacebook()
    {
        return
            'http://'
    . $_SERVER['HTTP_HOST']
    . $_SERVER['REQUEST_URI'];
    }
}