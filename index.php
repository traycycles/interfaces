<?php
/**
 * Created by PhpStorm.
 * User: tracy
 * Date: 6/19/2018
 * Time: 12:18 PM
 */

ini_set("error_reporting", E_ALL);
ini_set("display_errors", 1);

require 'src/config.php';
$slug = 'home'; //from page data. Can change to page wish to display
//$content = new Pages($repo, 1);
if(isset($_GET['slug'])){
    $slug = filter_input(INPUT_GET, 'slug', FILTER_SANITIZE_STRING);
}

$content = new Pages($repo, $slug, 'slug');

require 'views/header.php';

require 'views/single.php';

require 'views/footer.php';