<?php

use \Core\Auth\DBAuth;
$auth = new DBAuth(App::getInstance()->getDb());
$Matricule = $auth->findNote($_SESSION['auth'])->Matricule;
$NomCand = $auth->findNote($_SESSION['auth'])->NomCand;
$PrenomCand = $auth->findNote($_SESSION['auth'])->PrenomCand;
$EtaO = $auth->findNote($_SESSION['auth'])->EtaO;
$Piece = $auth->findNote($_SESSION['auth'])->Piece;
$DateCand = $auth->findNote($_SESSION['auth'])->DateCand;
$LieuCand = $auth->findNote($_SESSION['auth'])->LieuCand;
$SexeCand = $auth->findNote($_SESSION['auth'])->SexeCand;
$emailCand = $auth->findNote($_SESSION['auth'])->emailCand;
$NumeroCand = $auth->findNote($_SESSION['auth'])->NumeroCand;
$NationCand = $auth->findNote($_SESSION['auth'])->NationCand;
$ResidCand = $auth->findNote($_SESSION['auth'])->ResidCand;
$Statut = $auth->findStatut($_SESSION['auth'])->Statut;
$VilleO = $auth->findNote($_SESSION['auth'])->VilleO;
$Serie =$auth->findNote($_SESSION['auth'])->Serie;
$N_MathB = $auth->findNote($_SESSION['auth'])->N_MathB;
$N_MathC = $auth->findNote($_SESSION['auth'])->N_MathC;
$N_PhyB = $auth->findNote($_SESSION['auth'])->N_PhyB;
$N_PhyC = $auth->findNote($_SESSION['auth'])->N_PhyC;
$N_AngB = $auth->findNote($_SESSION['auth'])->N_AngB;
$N_AngC =$auth->findNote($_SESSION['auth'])->N_AngC;
$M_Classe = $auth->findNote($_SESSION['auth'])->M_Classe;
$R_Annuelle = $auth->findNote($_SESSION['auth'])->R_annuelle;
$Mention = $auth->findNote($_SESSION['auth'])->Mention;
$NomPere = $auth->findParent($_SESSION['auth'])->NomPere;
$NomMere = $auth->findParent($_SESSION['auth'])->NomMere;
$PrenomPere = $auth->findParent($_SESSION['auth'])->PrenomPere;
$PrenomMere = $auth->findParent($_SESSION['auth'])->PrenomMere;
$NumeroPere = $auth->findParent($_SESSION['auth'])->NumeroPere;
$NumeroMere = $auth->findParent($_SESSION['auth'])->NumeroMere;
$ProfessionPere = $auth->findParent($_SESSION['auth'])->ProfessionPere;
$ProfessionMere = $auth->findParent($_SESSION['auth'])->ProfessionMere;
$Identifiant = $auth->findStatut($_SESSION['auth'])->identifiant;
$Password = $auth->findStatut($_SESSION['auth'])->password;
$photo = $auth->findNote($_SESSION['auth'])->photo;
 


$titre = App::getInstance()->getTable('User')->title;


?>


<div class="container row w-100 mx-auto">

<div class="h2 mx-auto text-center col-12 my-5"><?= $titre;?></div>
<div class="card-body mt-0">
<div class="row col-12"><p class="col-1"><strong>Identifiant</strong></p><p class="col-11">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?='20-TWIN-'.$Identifiant;?></p></div>
<div class="row col-12"><p class="col-1"><strong>Password</strong></p><p class="col-11">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= $Password;?></p></div>
</div>
<img src="../public/images/<?= $photo ?>" alt="thumbnail" class="img-thumbnail" style="width: 100px">

<?php



?>

<table class="table table-striped mt-5 border border-light">
  <thead class="black white-text">
    <tr>
      <th scope="col">Matricule</th>
      <th scope="col">Nom</th>
      <th scope="col">Prenom</th>
      <th scope="col">Etablissement d'origine</th>
      <th scope="col">Statut</th>
    </tr>
  </thead>
  <tbody>
    <tr >
      <th scope="row " class="border border-light"><?= $Matricule;?></th>
      <td class="border border-light"><?= $NomCand;?></td>
      <td class="border border-light"><?= $PrenomCand;?></td>
      <td class="border border-light"><?= $EtaO;?></td>
      <td class="border border-light"><strong><?= $Statut;?></strong></td>
    </tr>
  </tbody>
</table>

<button type="button" class="fermer btn btn-primary" data-toggle="modal" data-target="#modalQuickView">Voir plus</button>
<button class="btn btn-danger"><a style="color:white" href="deconnexion.php">Déconnexion</a></button>
<!-- Modal: modalQuickView -->
<div class="modal fade" id="modalQuickView" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <div class="row">
          <div class="col-lg-12">
            <h2 class="h2-responsive product-name">
              <strong>Espace candidat</strong>
            </h2>
            
            
            <!--Accordion wrapper-->
            <div class="accordion md-accordion" id="accordionEx" role="tablist" aria-multiselectable="true">

              <!-- Accordion card -->
              <div class="card">

                <!-- Card header -->
                <div class="card-header" role="tab" id="headingOne1">
                  <a data-toggle="collapse" data-parent="#accordionEx" href="#collapseOne1" aria-expanded="true"
                    aria-controls="collapseOne1">
                    <h5 class="mb-0">
                      Civilité <i class="fas fa-angle-down rotate-icon"></i>
                    </h5>
                  </a>
                </div>
                <!-- Card body -->
                <div id="collapseOne1" class="collapse show" role="tabpanel" aria-labelledby="headingOne1"
                  data-parent="#accordionEx">
                  <div class="card-body">
                    <div class="row"><p class="col-5"><strong>Nom</strong></p><p class="col-7">:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= $NomCand;?></p></div>
                    <div class="row"><p class="col-5"><strong>Prenoms</strong></p><p class="col-7">:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= $PrenomCand;?></p></div>
                    <div class="row"><p class="col-5"><strong>Date de naissance</strong></p><p class="col-7">:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= $DateCand;?></p></div>
                    <div class="row"><p class="col-5"><strong>Lieu de naissance</strong></p><p class="col-7">:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= $LieuCand;?></p></div>
                    <div class="row"><p class="col-5"><strong>Sexe</strong></p><p class="col-7">:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= $SexeCand;?></p></div>
                    <div class="row"><p class="col-5"><strong>Email</strong></p><p class="col-7">:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= $emailCand;?></p></div>
                    <div class="row"><p class="col-5"><strong>Numero de telephone</strong></p><p class="col-7">:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= $NumeroCand;?></p></div>
                    <div class="row"><p class="col-5"><strong>Nationalité</strong></p><p class="col-7">:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= $NationCand;?></p></div>
                    <div class="row"><p class="col-5"><strong>Lieu de residence</strong></p><p class="col-7">:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= $ResidCand;?></p></div>
                    <div class="row"><p class="col-5"><strong>Numero de CNI</strong></p><p class="col-7">:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= $Piece;?></p></div>
                  </div>
                </div>

              </div>
              <!-- Accordion card -->

              <!-- Accordion card -->
              <div class="card">

                <!-- Card header -->
                <div class="card-header" role="tab" id="headingTwo2">
                  <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx" href="#collapseTwo2"
                    aria-expanded="false" aria-controls="collapseTwo2">
                    <h5 class="mb-0">
                      Note <i class="fas fa-angle-down rotate-icon"></i>
                    </h5>
                  </a>
                </div>

                <!-- Card body -->
                <div id="collapseTwo2" class="collapse" role="tabpanel" aria-labelledby="headingTwo2"
                  data-parent="#accordionEx">
                  <div class="card-body">
                    <div class="row"><p class="col-5"><strong>Serie</strong></p><p class="col-7">:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= $Serie;?></p></div>
                    <div class="row"><p class="col-5"><strong>Mention</strong></p><p class="col-7">:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= $Mention;?></p></div>
                    <div class="row"><p class="col-5"><strong>Etablissement d'origine</strong></p><p class="col-7">:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= $EtaO;?></p></div>
                    <div class="row"><p class="col-5"><strong>Ville d'origine</strong></p><p class="col-7">:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= $VilleO;?></p></div>
                    <div class="row"><p class="col-5"><strong>Note de math au bac</strong></p><p class="col-7">:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= $N_MathB;?></p></div>
                    <div class="row"><p class="col-5"><strong>Note de math en classe</strong></p><p class="col-7">:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= $N_MathC;?></p></div>
                    <div class="row"><p class="col-5"><strong>Note de physique au bac</strong></p><p class="col-7">:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= $N_PhyB;?></p></div>
                    <div class="row"><p class="col-5"><strong>Note de physique en classe</strong></p><p class="col-7">:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= $N_PhyC;?></p></div>
                    <div class="row"><p class="col-5"><strong>Note d'anglais au bac</strong></p><p class="col-7">:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= $N_AngB;?></p></div>
                    <div class="row"><p class="col-5"><strong>Note d'anglais en classe</strong></p><p class="col-7">:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= $N_AngC;?></p></div>
                  </div>
                </div>

              </div>
              <!-- Accordion card -->

              <!-- Accordion card -->
              <div class="card">

                <!-- Card header -->
                <div class="card-header" role="tab" id="headingThree3">
                  <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx" href="#collapseThree3"
                    aria-expanded="false" aria-controls="collapseThree3">
                    <h5 class="mb-0">
                      Information supplementaire <i class="fas fa-angle-down rotate-icon"></i>
                    </h5>
                  </a>
                </div>

                <!-- Card body -->
                <div id="collapseThree3" class="collapse" role="tabpanel" aria-labelledby="headingThree3"
                  data-parent="#accordionEx">
                  <div class="card-body">
                    <div class="row"><p class="col-5"><strong>Nom du père</strong></p><p class="col-7">:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= $NomPere;?></p></div>
                    <div class="row"><p class="col-5"><strong>Prenoms du père</strong></p><p class="col-7">:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= $PrenomPere;?></p></div>
                    <div class="row"><p class="col-5"><strong>Numero de telephone du père</strong></p><p class="col-7">:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= $NumeroPere;?></p></div>
                    <div class="row"><p class="col-5"><strong>Profession du père</strong></p><p class="col-7">:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= $ProfessionPere;?></p></div>
                    <div class="row"><p class="col-5"><strong>Nom du mère</strong></p><p class="col-7">:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= $NomMere;?></p></div>
                    <div class="row"><p class="col-5"><strong>Prenoms de la mère</strong></p><p class="col-7">:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= $PrenomMere;?></p></div>
                    <div class="row"><p class="col-5"><strong>Numero de telephone de la mère</strong></p><p class="col-7">:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= $NumeroMere;?></p></div>
                    <div class="row"><p class="col-5"><strong>Profession de la mère</strong></p><p class="col-7">:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= $ProfessionMere;?></p></div>
                  </div>
                </div>

              </div>
              <!-- Accordion card -->

            </div>
            <!-- Accordion wrapper -->


            <!-- Add to Cart -->
            <div class="card-body">
              
              <div class="text-center">

                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
            </div>
            <!-- /.Add to Cart -->
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

</div>

<!-- Footer -->
<footer class="page-footer font-small blue" style="position: relative; bottom: 0; width: 100%;">
<!-- Copyright -->
<div class="footer-copyright text-center py-3">Tous droits reservés:
  <a href="https://mdbootstrap.com/"> www.esatic.com</a>
</div>
<!-- Copyright -->
</footer>
<script>
// Material Select Initialization
$(document).ready(function() {
  $('.mdb-select').materialSelect();
  $('.fermer').click(function{

  })
  });
</script>