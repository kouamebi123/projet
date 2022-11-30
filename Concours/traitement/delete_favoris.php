<?php
session_start();
try {
include("../DB/connexion_DB.php");

$requete = $connexion->prepare(
    "DELETE FROM favoris WHERE idannonce=? AND idutilisateur=?
    ");
$requete->execute(array($_POST['idannonce'],$_SESSION['Auth']));


$requete1 = $connexion->prepare("SELECT count(favoris.idannonce) as compte
                        FROM favoris
                        WHERE favoris.idutilisateur =".$_SESSION['Auth']."");
                        $requete1->execute();
                        $resultat1 = $requete1->fetch();
                        echo '<li><a href="favoris.php">Favoris : '.$resultat1["compte"].' enregistrés</a></li>';
   

}
catch(PDOException $e){
    echo 'Echec de la connexion: '.$e->getMessage();
}
?>