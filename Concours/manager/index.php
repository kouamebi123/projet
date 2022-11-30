<?php
session_start();
if(empty($_SESSION['Auth'])){
    header('location:../login.php');
}
if($_SESSION['Role']=="user"){
    include("inc/top1.php");
}
else if($_SESSION['Role']=="admin"){
    include("inc/top.php");
}
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
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body">Annonces</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="list_annonces.php">En savoir plus</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            
                        </div>
                        <div class="card mb-4">
                            <div class="card-body" style="text-align: center;">
                                <a href="add_annonce.php"><input style=" height: 40px; padding:5px 10px 10px 10px" type="submit" name="" value="Ajouter une annonce" /></a>
                            </div>
                        </div>
                    </div>
                </main>
                
                <!-- fin contenu -->
               
               
<?php
include("inc/bottom.php");
?>
