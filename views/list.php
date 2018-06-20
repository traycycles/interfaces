<?php
/**
 * Created by PhpStorm.
 * User: tracy
 * Date: 6/14/2018
 * Time: 10:58 PM
 */

//give us a sample of each post

if($item->status == 'published'){
    echo '<article>';
    echo '<h2><a href="?id=' . $item->id .'">' . $item->title . '</a></h2>';
    if($content instanceof TrackableInterface){
        include __DIR__ .'/track.php';
    }
    echo '<p>' . $content->shortDescription() . '</p>'; //Collection.php handles description not the item itself
    //todo: add comment tab to div
    echo '</article>';
}