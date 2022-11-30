<?php
session_start();
try {
include("../DB/connexion_DB.php");
$requete = $connexion->prepare(
            "INSERT INTO utilisateur (nomutilisateur, prenomsutilisateur, email, mot_pass, roles) VALUES (:nomutilisateur, :prenomsutilisateur, :email, :mot_pass, :roles)
            ");
$user = "user";
$requete->bindParam(':nomutilisateur', $_POST['nom']);
$requete->bindParam(':prenomsutilisateur',$_POST['prenoms'] );
$requete->bindParam(':email', $_POST['email']);
$requete->bindParam(':mot_pass', $_POST['password']);
$requete->bindParam(':roles', $user);
$requete->execute();

$_SESSION['Auth'] = $_POST['nom'];
if(!empty($_SESSION['Auth'])){
    header('location:../manager/index.php');
}

}
catch(PDOException $e){
    echo 'Echec de la connexion: '.$e->getMessage();
}
?>