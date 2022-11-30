<?php
session_start();
if($_SESSION['Role']=="user"){
    include("inc/top1.php");
}
else if($_SESSION['Role']=="admin"){
    include("inc/top.php");
}

if(!empty($_POST)){
    try {
        $requete = $connexion->prepare(
            "INSERT INTO categorie (nomcategorie) VALUES (:nomcategorie)
            ");

        $requete->bindParam(':nomcategorie', $_POST['categorie']);
        $requete->execute();
        echo '<script type="text/javascript">
			alert("Ajouté avec succès")
			</script>';
    }
    catch(PDOException $e){
        echo 'Echec de la connexion: '.$e->getMessage();
    }
    
}
?>


            
            <!--  debut contenu -->
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Catégories</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Catégories</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                                Creer vos categories
                                .
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Ajouter une catégorie
                            </div>
                            <div class="card-body">
                                <form action="" method="post">
                                    
                                        <tr>
                                            <th>Nom </th>
                                            <th><input type="text" name="categorie" value="" /> </th>
                                            <th><input type="submit" name="submit" value="Ajouter cette catégorie" /></th>
                                        </tr>
                                    
                                    
                                   
                                </form>
                            </div>
                        </div>
                    </div>
                </main>

                                <!-- fin contenu -->
               
               
<?php
include("inc/bottom.php");
?>
