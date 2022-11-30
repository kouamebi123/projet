<?php

use \Core\Auth\DBAuth;

define('ROOT',dirname(__DIR__));
require ROOT.'/App/App.php';
App::load();


if(isset($_GET['p'])){
    $p = $_GET['p'];
} 

else{
    $p = 'user';
}

$app = App::getInstance();
$auth = new DBAuth($app->getDb());
if(!$auth->logged()){
    $app->forbidden();
}

ob_start();
if($p ==='user'){
    require ROOT.'/pages/users/espace.php';
}

$content = ob_get_clean();
require ROOT.'/pages/templates/default.php';



?>
