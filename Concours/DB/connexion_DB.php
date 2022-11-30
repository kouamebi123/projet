<?php
include("config.php");
try {
    if(empty($_SESSION['Auth'])){
        $connexion = new PDO("mysql:host=$db_host", $db_user, $db_pass);
        $connexion -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        include("CREATE_BD.php");
        $connexion -> exec($codesql);
    }
    else{
        $connexion = new PDO("mysql:host=$db_host; dbname=$db_name", $db_user, $db_pass);
        $connexion -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    
        
}
catch(PDOException $e){
    echo 'Echec de la connexion: '.$e->getMessage();
}
?>