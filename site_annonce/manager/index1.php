<?php
session_start();
if(!empty($_SESSION['Role'])){
if(empty($_SESSION['Auth'])){
    header('location:login.php');
}
if($_SESSION['Role']=="user"){
    include("inc/top1.php");
}
else if($_SESSION['Role']=="admin"){
    include("inc/top.php");
}
}
else{header('location:login.php');
}
$requete9 = $connexion->prepare('SELECT * FROM annonce');	
$requete9->execute();
?>


            
            <!--  debut contenu -->
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">Membres</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="list_membres.php">En savoir plus</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body">Catégories</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="list_categories.php">En savoir plus</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body">Annonces</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="list_annonces.php">En savoir plus</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body">Contact</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="list_contacts.php">En savoir plus</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
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
