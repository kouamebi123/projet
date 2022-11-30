<?php
session_start();

if(!empty($_SESSION['Auth'])){
    try {
        include("../DB/connexion_DB.php");
        
        $requete2 = $connexion->prepare(
            'SELECT idannonce
            FROM favoris
            WHERE idannonce="'.$_POST['idannonce'].'" AND idutilisateur="'.$_SESSION['Auth'].'"
            ');
            $requete2->execute();
            $resultat2 = $requete2->fetch();
            if(!$resultat2){
                $requete = $connexion->prepare(
                    "INSERT INTO favoris (idannonce, idutilisateur) VALUES (:idannonce, :idutilisateur)
                    ");
                $requete->bindParam(':idannonce', $_POST['idannonce']);
                $requete->bindParam(':idutilisateur',$_SESSION['Auth']);
                $requete->execute();
        
                $requete1 = $connexion->prepare("SELECT count(favoris.idannonce) as compte
                        FROM favoris
                        WHERE favoris.idutilisateur =".$_SESSION['Auth']."");
                        $requete1->execute();
                        $resultat1 = $requete1->fetch();
                        echo '<li><a href="favoris.php">Favoris : '.$resultat1["compte"].' enregistrés</a></li>';
            }
        
        }
        catch(PDOException $e){
            echo 'Echec de la connexion: '.$e->getMessage();
        }
}
else{
    echo "false";
}


?>