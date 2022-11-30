<?php
session_start();
try {
include("../DB/connexion_DB.php");

$requete = $connexion->prepare(
    "DELETE FROM favoris WHERE idannonce=?
    ");
$requete->execute(array($_GET['id']));

$requete1 = $connexion->prepare(
    "DELETE FROM annonce WHERE idannonce=?
    ");
$requete1->execute(array($_GET['id']));

header('location:list_categories.php');

}
catch(PDOException $e){
    echo 'Echec de la connexion: '.$e->getMessage();
}
?>