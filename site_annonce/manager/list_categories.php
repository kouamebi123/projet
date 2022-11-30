<?php
session_start();

if(!empty($_SESSION['Role'])){
if($_SESSION['Role']=="user"){
    include("inc/top1.php");
}
else if($_SESSION['Role']=="admin"){
    include("inc/top.php");
    $requete9 = $connexion->prepare('SELECT * FROM categorie');	
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
                                            <th>Id</th>
                                            <th>Nom de la categorie</th>
                                            <th>Modifier</th>
                                            <th>Supprimer</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Id</th>
                                            <th>Nom de la categorie</th>
                                            <th>Modifier</th>
                                            <th>Supprimer</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php while($resultat9 = $requete9->fetch()){
		                                        echo'<tr>
                                            <td>'.$resultat9["idcategorie"].'</td>
                                                <td>'.$resultat9["nomcategorie"].'</td>
                                                <td><a href="modif_categorie.php?id='.$resultat9["idcategorie"].'">Modifier</a></td>
                                                <td><a href="delete_categorie.php?id='.$resultat9["idcategorie"].'">Supprimer</a></td>
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
