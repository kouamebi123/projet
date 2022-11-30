<?php

use \Core\Auth\DBAuth;

define('ROOT',dirname(__DIR__));
require ROOT.'/App/App.php';
App::load();


if(isset($_GET['p'])){
    $p = $_GET['p'];
} 

else{
    $p = 'Acceuil';
}

ob_start();
if($p ==='Acceuil'){
    require ROOT.'/pages/Acceuil.php';
} 

elseif($p === 'A_propos'){
    require ROOT.'/pages/A_propos.php';
} 

elseif($p === 'Parcours_TWIN'){
    require ROOT.'/pages/Acceuil.php';
}

elseif($p === 'inscription'){
    require ROOT.'/pages/inscription.php';
}

elseif($p === 'connection'){
    $app = App::getInstance();
    $auth = new DBAuth($app->getDb());
    if(!$auth->logged()){
        require ROOT.'/pages/connection.php';
    }
    else{
        require ROOT.'/pages/users/espace.php';
    } 
}
else{
    App::getInstance()->notFound();
}

$content = ob_get_clean();
require ROOT.'/pages/templates/default.php';



?>