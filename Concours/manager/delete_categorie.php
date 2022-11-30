<?php
session_start();
try {
include("../DB/connexion_DB.php");

$requete12 = $connexion->prepare('SELECT *
FROM categorie
WHERE categorie.idcategorie="'.$_GET["id"].'" AND categorie.nomcategorie="Autres"
');
$requete12->execute();
$resultat12 = $requete12->fetch();
if(!empty($resultat12)){
    echo '<script type="text/javascript">
			alert("Impossible de supprimer la categorie autre")
			</script>';
            header('location:list_categories.php');
    }
    else{
$requete4 = $connexion->prepare('SELECT *
FROM categorie
WHERE categorie.nomcategorie="Autres"
');
$requete4->execute();
$resultat4 = $requete4->fetch();

if(empty($resultat4["idcategorie"])){
    $requete = $connexion->prepare(
        "INSERT INTO categorie (nomcategorie) VALUES (:nomcategorie)
        ");
    $autre = "Autres";
    $requete->bindParam(':nomcategorie', $autre);
    $requete->execute();
    
    $requete9 = $connexion->prepare('SELECT *
FROM categorie
WHERE categorie.nomcategorie="Autres"
');
$requete9->execute();
$resultat9 = $requete9->fetch();

    $requete6 = $connexion->prepare(
        'UPDATE annonce SET idcategorie ="'.$resultat9['idcategorie'].'"  WHERE annonce.idcategorie="'.$_GET["id"].'"
            ');
    $requete6->execute();
}
else{
    $requete6 = $connexion->prepare(
        'UPDATE annonce SET idcategorie ="'.$resultat4['idcategorie'].'"  WHERE annonce.idcategorie="'.$_GET["id"].'"
            ');
    $requete6->execute();
}

$requete = $connexion->prepare(
    "DELETE FROM categorie WHERE idcategorie=?
    ");
$requete->execute(array($_GET['id']));

header('location:list_categories.php');
}

}
catch(PDOException $e){
    echo 'Echec de la connexion: '.$e->getMessage();
}
?>