<?php 
session_start();
require_once("vendor/autoload.php");

use \Slim\Slim;
use \Hcode\Page;
use \Hcode\Model\Product;

$app = new Slim();

$app->config('debug', true);

$app->get('/', function() {

    $products = Product::listAll();

    $page = new Page();

    $page->setTpl("index", [
        'products'=>Product::checkList($products)
    ]);

});
require_once("functions.php");
require_once("site.php");
require_once("admin.php");
require_once("admin-users.php");
require_once("admin-categories.php");
require_once("admin-products.php");
require_once("admin-orders.php");

$app->run();

 ?>