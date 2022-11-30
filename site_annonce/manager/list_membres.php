<?php
session_start();

if(!empty($_SESSION['Role'])){
if($_SESSION['Role']=="user"){
    include("inc/top1.php");
}
else if($_SESSION['Role']=="admin"){
    include("inc/top.php");
    $requete9 = $connexion->prepare('SELECT * FROM utilisateur WHERE roles="user"');	
    $requete9->execute();
}
}
else{header('location:../index.php');
}


?>


            
            <!--  debut contenu -->
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Categorie</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Categorie</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                                Toutes mes Categories
                                .
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Categorie
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Nom</th>
                                            <th>Prenoms</th>
                                            <th>Email</th>
                                            
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                        <th>Nom</th>
                                            <th>Prenoms</th>
                                            <th>Email</th>
                                            
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php while($resultat9 = $requete9->fetch()){
		                                        echo'<tr>
                                            <td>'.$resultat9["nomutilisateur"].'</td>
                                                <td>'.$resultat9["prenomsutilisateur"].'</td>
                                                <td>'.$resultat9["email"].'</td>
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
