<?php
//ini_set("error_reporting", E_ALL);
//ini_set("display_errors", 1);

//require_once 'src/classes/Collection.php';
//creating config file in the src directory
require_once 'src/config.php';
//check for id being passed and use that single item

if(isset($_GET['id'])){
    $content= new Posts(
        $repo,
        filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT)
    );
}
//validate that there is a single item to use
//if(isset($content) && $content->count() == 1 && $content->current()->status == 'published'){
if(!isset($content) || $content->count() != 1 || $content->current()->status != 'published'){
   // $title = $content->current()->title; No longer need set the title to abstract method getTitle()
//}else {
    $content = new Posts($repo); //select all posts
  //  $title = "My Website";
}
require 'views/header.php';
?>
<!--<pre>--><?php
//    print_r($repo->all('posts'))?>
<!---->
<!--</pre>--><?php
//var_dump($repo->all('posts'));
//var_dump($repo->find('posts', 1));


//check to see which view to show
if($content->count() == 1){
    include 'views/single.php';
}else{
    foreach($content as $item){
    //echo $item->title;
    //echo "<br/>";
    include 'views/list.php';
    }
}
require 'views/footer.php';