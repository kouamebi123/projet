<?php

if(isset($_GET['p'])){
    $p = $_GET['p'];
} 

else{
    $p = 'Acceuil';
}

if($p ==='Acceuil'){
    header('Location:public/index.php');
}
else{
    App::getInstance()->notFound();
}

?>
