<?php
session_start();

if(!empty($_SESSION['Role'])){
if($_SESSION['Role']=="user"){
    include("inc/top1.php");
    $requete9 = $connexion->prepare('SELECT * FROM annonce WHERE annonce.idutilisateur="'.$_SESSION['Auth'].'"');	
    $requete9->execute();
}
else if($_SESSION['Role']=="admin"){
    include("inc/top.php");
    $requete9 = $connexion->prepare('SELECT * FROM annonce');	
    $requete9->execute();
}
}
else{header('location:../index.php');
}

?>


            
            <!--  debut contenu -->
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Annonces</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Annonces</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                                Toutes mes annonces
                                .
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Annonces
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Titre</th>
                                            <th>Date</th>
                                            <th>prix</th>
                                            <th>Description</th>
                                            <th>Modifier</th>
                                            <th>Supprimer</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Titre</th>
                                            <th>Date</th>
                                            <th>prix</th>
                                            <th>Description</th>
                                            <th>Modifier</th>
                                            <th>Supprimer</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php while($resultat9 = $requete9->fetch()){
		                                        echo'<tr>
                                            <td>'.$resultat9["titreannonce"].'</td>
                                                <td>'.$resultat9["dateannonce"].'</td>
                                                <td>'.$resultat9["prix"].'</td>
                                                <td >'.$resultat9["texteannonce"].'</td>
                                                <td><a href="modif_annonce.php?id='.$resultat9["idannonce"].'">Modifier</a></td>
                                                <td><a href="delete_annonce.php?id='.$resultat9["idannonce"].'">Supprimer</a></td>
                                        </tr>';} 
                                        ?>      
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>

                                <!-- fin contenu -->
               
               
<?php
include("inc/bottom.php");
?>
