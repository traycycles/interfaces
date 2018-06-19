<?php
/**
 * Created by PhpStorm.
 * User: tracy
 * Date: 6/15/2018
 * Time: 2:50 PM
 */

echo '<div class="row">';
if($content instanceof TrackableInterface){
    include __DIR__ .'/track.php';
}
if($content instanceof ShareableInterface){
    include __DIR__ .'/share.php';
}
echo '</div>';
echo '<article>';
echo $content->current()->details;
echo '</article>';
