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
        $dossier = "../images/";
        $fichier = $_FILES["photo"]["name"];

        $requete = $connexion->prepare(
            "INSERT INTO annonce (titreannonce, texteannonce, prix, dateannonce, idcategorie, idutilisateur, lienImage) VALUES (:titreannonce, :texteannonce, :prix, :dateannonce, :idcategorie, :idutilisateur, :lienImage)
            ");

        $requete->bindParam(':titreannonce', $_POST['titre']);
        $requete->bindParam(':texteannonce',$_POST['description'] );
        $requete->bindParam(':prix', $_POST['prix']);
        $requete->bindParam(':dateannonce', $_POST['date']);
        $requete->bindParam(':idcategorie', $_POST['categorie']);
        $requete->bindParam(':idutilisateur', $_SESSION['Auth']);
        $requete->bindParam(':lienImage', $fichier);
        $requete->execute();
        move_uploaded_file($_FILES["photo"]["tmp_name"],$dossier.$fichier);
        echo '<script type="text/javascript">
			alert("Ajouté avec succès")
			</script>';
    }
    catch(PDOException $e){
        echo 'Echec de la connexion: '.$e->getMessage();
    }
    
}

try{
    $requete5 = $connexion->prepare("SELECT * FROM categorie");
    $requete5->execute();
}
catch(PDOException $e){
    echo 'Echec de la connexion: '.$e->getMessage();
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
                                Creer vos annonces
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Ajouter une Annonce
                            </div>
                            <div class="card-body" >
                                <form action="" method="post" enctype="multipart/form-data" style=" width:100%">
                                    <div>
                                        <div style="display: inline-block; width:50%; margin:5px 15px 5px 15px">
                                            <label for="" style="width:100%"> Titre </label>
                                            <input style="width:100%" type="text" name="titre" value="" required /> 
                                        </div>
                                        <div style="display: inline-block;  width:40%; margin:5px 15px 5px 15px">
                                            <label for="" style="width:100%"> Categorie</label>
                                            <select name="categorie" style="width:100%" type="text" required>
                                            <?php while($resultat5 = $requete5->fetch()){
                                                echo'<option value="'.$resultat5["idcategorie"].'">'.$resultat5["nomcategorie"].'</option>';
                                            } ?>
                                                
                                            </select>
                                        </div>
                                    </div>

                                    <div>
                                        <div style="display: inline-block;  width:30%; margin:5px 15px 5px 15px">
                                            <label for="" type="" style="width:100%"> Prix </label>
                                            <input style="width:100%" type="number" name="prix" value="" required/>
                                        </div>
                                        <div style="display: inline-block; width:30%; margin:5px 15px 5px 15px">
                                            <label for="" style="width:100%"> Date </label>
                                            <input style="width:100%" type="date" name="date" value="" required/>  
                                        </div>
                                        <div style="display: inline-block; width:30%; margin:5px 15px 5px 15px">
                                            <label for="" style="width:100%"> Image </label>
                                            <input style="width:100%; height:40px"  type="file" name="photo" accept="image/png, image/jpeg" value="" required/>
                                        </div>
                                    </div>
                                    
                                    <div style="display: inline-block; width:94%; margin:5px 15px 5px 15px">
                                        <label for="" style="width:100%"> Description</label>
                                        <textarea style="width:100%" type="textarea" name="description" value="" required> </textarea> 
                                    </div>
                                    <input style="display: inline-block; margin:15px 15px 5px 15px" type="submit" name="submit" value="Ajouter cette Annonce" />  
                                </form>
                                
                            </div>
                        </div>
                    </div>
                </main>

                                <!-- fin contenu -->
               
               
<?php
include("inc/bottom.php");
?>
